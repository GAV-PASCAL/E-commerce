<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\CommandeController;

Route::get('/', function () {
    $categories = \App\Models\Categorie::all();
    $produits = \App\Models\Produits::with('categorie', 'urlimg')->latest()->take(8)->get();
    return view('accueil', compact('categories', 'produits'));
});

Route::get('/savoir', function () {
    return view('marche');
});

Route::get('/boutique', [ProduitController::class, 'liste'])->name('produits.liste');
Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.show');




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1') // 5 tentatives par minute
    ->name('login.post');
    
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('throttle:3,1') // 3 inscriptions max par minute
    ->name('register.post');
    
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/client', function () {
        return view('dashbord.client.information', ['user' => auth()->user()]);
    })->name('dashbord.client.information');


    
    // Routes pour les conversations
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversations/start/{produitId?}', [ConversationController::class, 'startConversation'])->name('conversations.start');
    Route::get('/conversations/{id}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations', [ConversationController::class, 'store'])->name('conversations.store');
    Route::post('/conversations/{id}/mark-as-read', [ConversationController::class, 'markAsRead'])->name('conversations.markAsRead');
    
    // Routes pour les favoris
    Route::get('/favoris', [\App\Http\Controllers\FavorisController::class, 'index'])->name('favoris.index');
    Route::post('/favoris/toggle', [\App\Http\Controllers\FavorisController::class, 'toggle'])->name('favoris.toggle');
    Route::get('/favoris/ids', [\App\Http\Controllers\FavorisController::class, 'getFavoriteIds'])->name('favoris.ids');
    
    // Routes pour les commandes (client)
    Route::get('/mes-commandes', [CommandeController::class, 'mesCommandes'])->name('client.commandes');
    Route::get('/commande/{id}', [CommandeController::class, 'show'])->name('commande.show');
    Route::get('/commande/{id}/pdf', [CommandeController::class, 'generatePDF'])->name('commande.pdf');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/categories/liste', [CategorieController::class, 'index'])->name('dashbord.vendeur.categories.index');
    Route::get('/admin/categories/ajouter', [CategorieController::class, 'create'])->name('dashbord.vendeur.categories.ajouter');
    Route::post('/admin/categories', [CategorieController::class, 'store'])->name('dashbord.vendeur.categories.store');

    Route::get('/admin/produits/liste', [ProduitController::class, 'index'])->name('dashbord.vendeur.produits.index');
    Route::get('/admin/produits/ajouter', [ProduitController::class, 'create'])->name('dashbord.vendeur.produits.ajouter');
    Route::post('/admin/produits', [ProduitController::class, 'store'])->name('dashbord.vendeur.produits.store');
    Route::get('/admin/produits/{id}/modifier', [ProduitController::class, 'edit'])->name('dashbord.vendeur.produits.edit');
    Route::put('/admin/produits/{id}', [ProduitController::class, 'update'])->name('dashbord.vendeur.produits.update');
    Route::delete('/admin/produits/{id}', [ProduitController::class, 'destroy'])->name('dashbord.vendeur.produits.destroy');

    // Routes pour les commandes (vendeur)
    Route::get('/commande/create', [CommandeController::class, 'create'])->name('dashbord.vendeur.commande.create');
    Route::post('/commande/search-user', [CommandeController::class, 'searchUser'])->name('dashbord.vendeur.commande.search-user');
    Route::post('/commande/store', [CommandeController::class, 'store'])->name('dashbord.vendeur.commande.store');
    Route::get('/commande/liste', [CommandeController::class, 'index'])->name('dashbord.vendeur.commande.liste');
    Route::delete('/commande/{id}', [CommandeController::class, 'destroy'])->name('dashbord.vendeur.commande.destroy');

    // Route pour la messagerie vendeur
    Route::get('/admin/messages', [ConversationController::class, 'index'])->name('dashbord.vendeur.messages.index');

    Route::get('/dashboard/vendeur', function () {
        return view('dashbord.vendeur.information', ['user' => auth()->user()]);
    })->name('dashbord.vendeur.information');
});


