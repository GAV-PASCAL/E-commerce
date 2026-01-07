@extends('layouts.app')

@section('title', 'Ajouter produits')

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

            <div class="back_formulaire">

                <div class="produit_search">
                    <input type="search" placeholder="Rechercher un produit" class="produit_search_input">
                    <a href="{{ route('produits.create') }}" id="a" class="produit_ajout_rapide">Crée une fiche</a>
                </div>

                <table class="table_dash">
                    <thead>
                        <tr>
                            <th class="test"></th>
                            <th>Nom du produit</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{ $produit->nom }}</td>
                            <td><input id="input_number" type="number" value=""></td>
                            <td><input id="input_number" type="number" value=""></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection