@extends('layouts.app')

@section('title', 'Informations du client')

@section('header')

    <section>
        <div class="title_dash">
            <div>
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100px" height="50px">
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
        <div style="background-color: #B45309; flex-basis: 22%; border-right: 1px solid #B45309;">
            <div style="height: 100vh;">
                <x-client/>
            </div>
        </div> 

        <div class="section_dash">
            <button class="btn-edit">
                <i class="fa-solid fa-pen-to-square"></i>
                Modifier
            </button>
            <div id="back_formulaire">
                <h4 class="info_form">Informations Personnelles</h4>

                <table class="table_dash_info">
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

@endsection
