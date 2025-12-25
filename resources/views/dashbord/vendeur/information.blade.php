@extends('layouts.app')

@section('title', 'Informations du vendeur')

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
                <h4 class="info_form">Informations Personnelles</h4>

                <div class="produit_search">
                    <a href="#" id="a" class="produit_ajout_rapide">Modifier</a>
                </div>

                <table class="table_dash">
                    <tr>
                        <td><strong>Nom</strong></td>
                        <td>{{ $user->nom }}</td>
                    </tr>
                    <tr>
                        <td><strong>Prénom</strong></td>
                        <td>{{ $user->prenom }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Rôle</strong></td>
                        <td>{{ $user->role->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Membre depuis</strong></td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    </tr>
                </table>
                
            </div>            
        </div>

    </div>

    <x-footer/>

@endsection
