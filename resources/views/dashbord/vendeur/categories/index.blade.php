@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('header')

    <div class="title_dash">
        <h1>DASHBOARD</h1>
    </div>

@endsection

@section('content')

    <div id="page_structure">
        <x-dashheader/>

        <div class="section_dash">
            <x-dashnav/>

            <div class="produits_liste">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="produit_search">
                    <input type="search" placeholder="Rechercher une catégorie" class="produit_search_input">
                    <a href="{{ route('dashbord.vendeur.categories.ajouter') }}" class="produit_ajout_rapide">Ajouter</a>
                </div>

                <div>
                    <table class="table_dash"> 
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom de catégorie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td>{{ $categorie->nom }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <x-footer/>

@endsection