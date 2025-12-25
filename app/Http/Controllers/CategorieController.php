<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('dashbord.vendeur.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashbord.vendeur.categories.ajouter');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $categorie = Categorie::create([
            'nom' => $validated['nom'],
            'user_id' => auth()->id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('dashbord.vendeur.categories.index')->with('success', 'Catégorie créée avec succès.');
    }
}
