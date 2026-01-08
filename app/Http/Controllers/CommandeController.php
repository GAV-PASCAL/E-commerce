<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produits;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Liste des commandes pour le vendeur
     */
    public function index()
    {
        $commandes = Commande::with(['user', 'produits'])
            ->where('vendeur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashbord.vendeur.commandes.index', compact('commandes'));
    }

    /**
     * Afficher le formulaire de sélection des produits
     */
    public function create()
    {
        $produits = Produits::with('categorie')->get();
        return view('dashbord.vendeur.commandes.create', compact('produits'));
    }

    /**
     * Afficher le formulaire de renseignement du client
     */
    public function showClientForm(Request $request)
    {
        // Récupérer les données des produits sélectionnés depuis la session
        $produitsSelectionnes = session('produits_selectionnes', []);
        
        if (empty($produitsSelectionnes)) {
            return redirect()->route('commandes.create')
                ->with('error', 'Veuillez sélectionner au moins un produit.');
        }

        return view('dashbord.vendeur.commandes.form', compact('produitsSelectionnes'));
    }

    /**
     * Enregistrer les produits sélectionnés en session
     */
    public function storeSelection(Request $request)
    {
        $validated = $request->validate([
            'produits' => 'required|array|min:1',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.prix_unitaire' => 'required|numeric|min:0',
            'produits.*.quantite' => 'required|integer|min:1',
        ]);

        // Stocker en session
        session(['produits_selectionnes' => $validated['produits']]);

        return redirect()->route('commandes.client-form');
    }

    /**
     * Créer la commande avec l'email du client
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email_client' => 'required|email|exists:users,email',
            'date_commande' => 'required|date',
        ]);

        // Récupérer le client
        $client = User::where('email', $validated['email_client'])->first();

        if (!$client) {
            return back()->withErrors(['email_client' => 'Aucun client trouvé avec cet email.']);
        }

        // Récupérer les produits de la session
        $produitsSelectionnes = session('produits_selectionnes', []);

        if (empty($produitsSelectionnes)) {
            return redirect()->route('commandes.create')
                ->with('error', 'Session expirée. Veuillez recommencer.');
        }

        // Créer la commande
        $commande = Commande::create([
            'numero_fiche' => Commande::genererNumeroFiche(),
            'user_id' => $client->id,
            'vendeur_id' => Auth::id(),
            'date_commande' => $validated['date_commande'],
            'statut' => 'en_attente',
        ]);

        // Attacher les produits
        foreach ($produitsSelectionnes as $produitData) {
            $prixTotal = $produitData['prix_unitaire'] * $produitData['quantite'];
            
            $commande->produits()->attach($produitData['id'], [
                'quantite' => $produitData['quantite'],
                'prix_unitaire' => $produitData['prix_unitaire'],
                'prix_total' => $prixTotal,
            ]);
        }

        // Calculer le montant total
        $commande->calculerMontantTotal();

        // Nettoyer la session
        session()->forget('produits_selectionnes');

        return redirect()->route('commandes.index')
            ->with('success', 'Fiche de commande créée avec succès ! Numéro : ' . $commande->numero_fiche);
    }

    /**
     * Afficher une commande (pour le vendeur)
     */
    public function show($id)
    {
        $commande = Commande::with(['user', 'vendeur', 'produits'])
            ->findOrFail($id);

        // Vérifier que c'est bien le vendeur de cette commande
        if ($commande->vendeur_id !== Auth::id()) {
            abort(403);
        }

        return view('dashbord.vendeur.commandes.show', compact('commande'));
    }

    /**
     * Modifier une commande
     */
    public function edit($id)
    {
        $commande = Commande::with(['user', 'produits'])->findOrFail($id);

        if ($commande->vendeur_id !== Auth::id()) {
            abort(403);
        }

        $produits = Produits::with('categorie')->get();

        return view('dashbord.vendeur.commandes.edit', compact('commande', 'produits'));
    }

    /**
     * Mettre à jour une commande
     */
    public function update(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);

        if ($commande->vendeur_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'date_commande' => 'required|date',
            'produits' => 'required|array|min:1',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.prix_unitaire' => 'required|numeric|min:0',
            'produits.*.quantite' => 'required|integer|min:1',
        ]);

        // Mettre à jour la date
        $commande->update([
            'date_commande' => $validated['date_commande'],
        ]);

        // Détacher tous les anciens produits
        $commande->produits()->detach();

        // Attacher les nouveaux produits
        foreach ($validated['produits'] as $produitData) {
            $prixTotal = $produitData['prix_unitaire'] * $produitData['quantite'];
            
            $commande->produits()->attach($produitData['id'], [
                'quantite' => $produitData['quantite'],
                'prix_unitaire' => $produitData['prix_unitaire'],
                'prix_total' => $prixTotal,
            ]);
        }

        // Recalculer le montant total
        $commande->calculerMontantTotal();

        return redirect()->route('commandes.index')
            ->with('success', 'Commande mise à jour avec succès !');
    }

    /**
     * Supprimer une commande
     */
    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);

        if ($commande->vendeur_id !== Auth::id()) {
            abort(403);
        }

        $commande->delete();

        return redirect()->route('commandes.index')
            ->with('success', 'Commande supprimée avec succès !');
    }

    /**
     * Générer le PDF de la commande
     */
    public function generatePDF($id)
    {
        $commande = Commande::with(['user', 'vendeur', 'produits'])
            ->findOrFail($id);

        // Vérifier les permissions
        if ($commande->vendeur_id !== Auth::id() && $commande->user_id !== Auth::id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('pdf.commande', compact('commande'));
        
        return $pdf->download('commande-' . $commande->numero_fiche . '.pdf');
    }

    // ========== PARTIE CLIENT ==========

    /**
     * Liste des commandes pour le client
     */
    public function mesCommandes()
    {
        $commandes = Commande::with(['vendeur', 'produits'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashbord.client.commandes', compact('commandes'));
    }

    /**
     * Afficher une commande (pour le client)
     */
    public function showClient($id)
    {
        $commande = Commande::with(['vendeur', 'produits'])
            ->findOrFail($id);

        // Vérifier que c'est bien le client de cette commande
        if ($commande->user_id !== Auth::id()) {
            abort(403);
        }

        return view('dashbord.client.commande-detail', compact('commande'));
    }

    /**
     * Valider une commande (client accepte)
     */
    public function valider($id)
    {
        $commande = Commande::findOrFail($id);

        if ($commande->user_id !== Auth::id()) {
            abort(403);
        }

        if ($commande->statut !== 'en_attente') {
            return back()->with('error', 'Cette commande ne peut plus être validée.');
        }

        $commande->update(['statut' => 'validee']);

        return back()->with('success', 'Commande validée avec succès !');
    }
}
