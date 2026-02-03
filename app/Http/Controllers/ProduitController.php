<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits;
use App\Models\Categorie;
use App\Models\Urlimg;

class ProduitController extends Controller
{
    // Liste des produits pour le dashboard vendeur
    public function index(Request $request)
    {
        $query = Produits::with('categorie', 'urlimg');

        if ($request->filter === 'active') {
            $query->active();
        } elseif ($request->filter === 'inactive') {
            $query->where('is_active', false);
        }

        $produits = $query->paginate(15);
        return view('dashbord.vendeur.produits.index', compact('produits'));
    }

    // Liste publique des produits
    public function liste(Request $request)
    {
        $query = Produits::with('categorie', 'urlimg')->active();

        // Filtrage par catégorie
        if ($request->filled('categorie_id')) {
            $query->where('categorie_id', $request->categorie_id);
        }

        // Filtrage par prix
        if ($request->filled('prix_min')) {
            $query->where('prix', '>=', $request->prix_min);
        }
        if ($request->filled('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }

        // Recherche par nom
        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        // Tri
        $sort = $request->get('sort', 'recent');
        switch ($sort) {
            case 'prix_asc':
                $query->orderBy('prix', 'asc');
                break;
            case 'prix_desc':
                $query->orderBy('prix', 'desc');
                break;
            case 'populaire':
                // Pour l'instant, tri par nombre de vues ou aléatoire
                $query->inRandomOrder();
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $produits = $query->paginate(12)->appends($request->except('page'));
        $categories = Categorie::all();

        return view('produits', compact('produits', 'categories'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('dashbord.vendeur.produits.ajouter', compact('categories'));
    }

    // Afficher les détails d'un produit (vue publique)
    public function show(Produits $produit)
    {
        if (!$produit->is_active) {
            abort(404);
        }
        $produit->load(['categorie', 'urlimg']);
        $produitsRelated = Produits::active()
            ->where('categorie_id', $produit->categorie_id)
            ->where('id', '!=', $produit->id)
            ->limit(4)
            ->get();
        
        return view('produit-detail', compact('produit', 'produitsRelated'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'qte_min' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url_image' => 'nullable|url',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        // Gérer l'upload de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }

        // Gérer l'URL de l'image si fournie
        $urlimgId = null;
        if ($request->filled('url_image')) {
            $urlimg = Urlimg::firstOrCreate(['url' => $request->url_image]);
            $urlimgId = $urlimg->id;
        }

        $produit = Produits::create([
            'nom' => $validated['nom'],
            'description' => $validated['description'],
            'prix' => $validated['prix'],
            'qte_min' => $validated['qte_min'],
            'image' => $imagePath ?? '',
            'categorie_id' => $validated['categorie_id'],
            'urlimg_id' => $urlimgId ?? 1,
        ]);

        return redirect()->route('dashbord.vendeur.produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function edit(Produits $produit)
    {
        $categories = Categorie::all();
        return view('dashbord.vendeur.produits.update', compact('produit', 'categories'));
    }

    public function update(Request $request, Produits $produit)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'qte_min' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url_image' => 'nullable|url',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        // Gérer l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->image && \Storage::disk('public')->exists($produit->image)) {
                \Storage::disk('public')->delete($produit->image);
            }
            $validated['image'] = $request->file('image')->store('produits', 'public');
        }

        // Gérer l'URL de l'image si fournie
        if ($request->filled('url_image')) {
            $urlimg = Urlimg::firstOrCreate(['url' => $request->url_image]);
            $validated['urlimg_id'] = $urlimg->id;
        }

        $produit->update($validated);

        return redirect()->route('dashbord.vendeur.produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Produits $produit)
    {
        // Supprimer l'image si elle existe
        if ($produit->image && \Storage::disk('public')->exists($produit->image)) {
            \Storage::disk('public')->delete($produit->image);
        }

        $produit->delete();

        return redirect()->route('dashbord.vendeur.produits.index')->with('success', 'Produit supprimé avec succès.');
    }

    public function toggleStatus(Produits $produit)
    {
        $produit->is_active = !$produit->is_active;
        $produit->save();

        $status = $produit->is_active ? 'activé' : 'désactivé';
        return redirect()->back()->with('success', "Produit $status avec succès.");
    }
}
