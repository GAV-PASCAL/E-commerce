@extends('layouts.app')

@section('title', 'Mes Commandes')

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
                        <a href="{{ route('commandes.create') }}" class="produit_ajout_rapide" id="btn_ajout">
                            + Nouvelle
                        </a>
                </div>
            </section>

            <div class="back_formulaire">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($commandes->isEmpty())
                    <div class="alert alert-info">
                        Aucune commande pour le moment. <a href="{{ route('commandes.create') }}">Créer une première commande</a>
                    </div>
                @else
                    <table class="table_dash">
                        <thead>
                            <tr>
                                <th>Numéro de Fiche</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Montant Total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($commandes as $commande)
                                <tr>
                                    <td><strong>{{ $commande->numero_fiche }}</strong></td>
                                    <td>{{ $commande->user->nom }} {{ $commande->user->prenom }}</td>
                                    <td>{{ $commande->date_commande->format('d/m/Y') }}</td>
                                    <td>{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</td>
                                    <td>
                                        @if($commande->statut === 'en_attente')
                                            <span class="badge badge-warning" style="background: #ffc107; color: #000; padding: 5px 10px; border-radius: 5px;">
                                                En attente
                                            </span>
                                        @elseif($commande->statut === 'validee')
                                            <span class="badge badge-success" style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                                Validée
                                            </span>
                                        @else
                                            <span class="badge badge-danger" style="background: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                                Annulée
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 10px;">
                                            <a href="{{ route('commandes.show', $commande->id) }}" 
                                               class="btn btn-info" 
                                               style="background: #17a2b8; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                               <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('commandes.edit', $commande->id) }}" 
                                               class="btn btn-primary" 
                                               style="background: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('commandes.destroy', $commande->id) }}" 
                                                  method="POST" 
                                                  style="display: inline;"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger" 
                                                        >
                                                    <i class="fa-solid fa-trash"></i> 
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>            
        </div>

    </div>

@endsection
