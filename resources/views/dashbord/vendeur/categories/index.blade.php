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
                    <a href="{{ route('dashbord.vendeur.categories.ajouter') }}" class="btn-add" id="btn_ajout">
                        <i class="fa fa-plus"></i>
                        Ajouter
                    </a>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td>{{ $categorie->nom }}</td>
                                    <td>
                                        <form action="{{ route('dashbord.vendeur.categories.destroy', $categorie->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection