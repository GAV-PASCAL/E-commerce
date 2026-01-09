@extends('layouts.app')

@section('title', 'Liste des catégories')

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

        <div class="section_dash">
            <section id="head_search">

                <div class="produit_search">
                    <input type="search" placeholder="Rechercher une catégorie" class="produit_search_input">
                    <a href="{{ route('dashbord.vendeur.categories.ajouter') }}" class="produit_ajout_rapide" id="btn_ajout">Ajouter</a>
                </div>
            </section>

            <div class="produits_liste">
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

@endsection