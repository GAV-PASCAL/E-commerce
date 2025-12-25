<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoris;
use App\Models\Produits;

class FavorisController extends Controller
{
    /**
     * Afficher la liste des favoris de l'utilisateur connecté
     */
    public function index()
    {
        $favoris = auth()->user()->favoris()->with('produit.categorie', 'produit.urlimg')->get();
        return view('dashbord.client.favoris', compact('favoris'));
    }

    /**
     * Ajouter ou retirer un produit des favoris (toggle)
     */
    public function toggle(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id'
        ]);

        $userId = auth()->id();
        $produitId = $request->produit_id;

        // Vérifier si le produit est déjà dans les favoris
        $favori = Favoris::where('user_id', $userId)
            ->where('produit_id', $produitId)
            ->first();

        if ($favori) {
            // Retirer des favoris
            $favori->delete();
            return response()->json([
                'success' => true,
                'action' => 'removed',
                'message' => 'Produit retiré des favoris'
            ]);
        } else {
            // Ajouter aux favoris
            Favoris::create([
                'user_id' => $userId,
                'produit_id' => $produitId
            ]);
            return response()->json([
                'success' => true,
                'action' => 'added',
                'message' => 'Produit ajouté aux favoris'
            ]);
        }
    }

    /**
     * Vérifier si un produit est dans les favoris
     */
    public function check($produitId)
    {
        $isFavorite = Favoris::where('user_id', auth()->id())
            ->where('produit_id', $produitId)
            ->exists();

        return response()->json([
            'is_favorite' => $isFavorite
        ]);
    }

    /**
     * Obtenir tous les IDs des produits favoris de l'utilisateur
     */
    public function getFavoriteIds()
    {
        $favoriteIds = Favoris::where('user_id', auth()->id())
            ->pluck('produit_id')
            ->toArray();

        return response()->json([
            'favorite_ids' => $favoriteIds
        ]);
    }
}
