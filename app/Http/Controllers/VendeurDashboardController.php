<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produits;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendeurDashboardController extends Controller
{
    public function index()
    {
        $vendeurId = Auth::id();
        $user = Auth::user();

        // 1. Chiffre d'Affaires Total (Commandes validées)
        $ca_query = Commande::where('vendeur_id', $vendeurId)->where('statut', 'validee');
        $chiffreAffairesTotal = $ca_query->sum('montant_total');

        // 2. Volume de Commandes
        $volumeCommandes = Commande::where('vendeur_id', $vendeurId)->count();
        $commandesEnAttente = Commande::where('vendeur_id', $vendeurId)->where('statut', 'en_attente')->count();
        $commandesAcceptees = Commande::where('vendeur_id', $vendeurId)->where('statut', 'validee')->count();
        $commandesAnnulees = Commande::where('vendeur_id', $vendeurId)->where('statut', 'annulee')->count();

        // Montants par statut
        $montantAttente = Commande::where('vendeur_id', $vendeurId)->where('statut', 'en_attente')->sum('montant_total');
        $montantAccepte = $chiffreAffairesTotal; // Déjà calculé ci-dessus
        $montantAnnule = Commande::where('vendeur_id', $vendeurId)->where('statut', 'annulee')->sum('montant_total');

        // Moyenne Panier (AOV)
        $nbCommandesValidees = $ca_query->count();
        $panierMoyen = $nbCommandesValidees > 0 ? $chiffreAffairesTotal / $nbCommandesValidees : 0;

        // 3. Statistiques Produits
        $totalProduits = Produits::count(); 
        $produitsActifs = Produits::active()->count();
        $produitsInactifs = Produits::where('is_active', false)->count();

        // 4. Statistiques Catégories
        $categories = Categorie::withCount('produits')->get();
        $totalCategories = $categories->count();

        // 5. Top 5 Produits par Revenu
        $topProduits = Produits::join('commande_produit', 'produits.id', '=', 'commande_produit.produit_id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('commandes.vendeur_id', $vendeurId)
            ->where('commandes.statut', 'validee')
            ->select('produits.nom', DB::raw('SUM(commande_produit.prix_total) as total_revenu'), DB::raw('SUM(commande_produit.quantite) as total_vendu'))
            ->groupBy('produits.id', 'produits.nom')
            ->orderBy('total_revenu', 'desc')
            ->take(5)
            ->get();

        // 6. Commandes Récentes
        $commandesRecentes = Commande::with('user')
            ->where('vendeur_id', $vendeurId)
            ->latest()
            ->take(5)
            ->get();

        // 7. Données Chronologiques (Ventes par mois sur 6 mois)
        $ventesMensuelles = Commande::where('vendeur_id', $vendeurId)
            ->where('statut', 'validee')
            ->select(
                DB::raw('SUM(montant_total) as total'),
                DB::raw("DATE_FORMAT(created_at, '%M') as mois"),
                DB::raw("MONTH(created_at) as mois_num")
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('mois', 'mois_num')
            ->orderBy('mois_num')
            ->get();

        return view('dashbord.vendeur.analytics', compact(
            'user',
            'chiffreAffairesTotal',
            'volumeCommandes',
            'commandesEnAttente',
            'commandesAcceptees',
            'commandesAnnulees',
            'montantAttente',
            'montantAccepte',
            'montantAnnule',
            'panierMoyen',
            'totalProduits',
            'produitsActifs',
            'produitsInactifs',
            'categories',
            'totalCategories',
            'topProduits',
            'commandesRecentes',
            'ventesMensuelles'
        ));
    }
}
