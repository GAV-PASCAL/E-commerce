@extends('layouts.app')

@section('title', 'liste des produits')

@section('header')

    <section>
        <div class="title_dash">
            <div>
                <h1>DASHBOARD</h1>
            </div>
            <div class="conversation-header-page">
                <a href="{{ url('./') }}" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>
    </section>

@endsection

@section('content')

    <div id="page_structure">
        <x-dashheader/>

        <div class="section_dash" id="patie">
            <section id="head_search">

                <div class="produit_search">
                    <input type="search" placeholder="Rechercher un produit" class="produit_search_input">
                    <a href="{{ route('dashbord.vendeur.produits.ajouter') }}" class="produit_ajout_rapide" id="btn_ajout">Ajouter</a>
                </div>
            </section>

            <section class="produits_liste">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div>
                    <table class="table_dash"> 
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Prix du produit</th>
                                <th>Qte. Min</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produits as $produit)
                                <tr>
                                    <td>{{ $produit->id }}</td>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->categorie->nom ?? 'N/A' }}</td>
                                    <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                                    <td>{{ $produit->qte_min }}</td>
                                    
                                    <td class="table_action">
                                        <a href="{{ route('dashbord.vendeur.produits.edit', $produit->id) }}" title="Modifier">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        
                                        <form action="{{ route('dashbord.vendeur.produits.destroy', $produit->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit dans votre liste?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background:none; border:none; cursor:pointer; color: ;" title="Supprimer">
                                                <i class='bx bx-trash-alt'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align:center;">Aucun produit trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>

@endsection
