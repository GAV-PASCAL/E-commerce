@extends('layouts.app')

@section('title', 'Mes Commandes')

@section('header')

    <section>
        <div class="title_dash">
            <div>
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100px" height="50px">
            </div>
            <div class="conversation-header-page">
                <a href="{{ url('./produits') }}" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>
    </section>

@endsection

@section('content')

    <div class="dashboard_container">
        <div class="dashboard_sidebar_wrapper">
            <x-client/>
        </div> 

        <div class="dashboard_content">

            <div id="back_formulaire">
                <h4 class="info_form">Mes Commandes</h4>

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
                        Vous n'avez aucune commande pour le moment.
                    </div>
                @else
                    <table class="table_dash">
                        <thead>
                            <tr>
                                <th>Numéro de Fiche</th>
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
                                    <td>{{ $commande->date_commande->format('d/m/Y') }}</td>
                                    <td>{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</td>
                                    <td>
                                        @if($commande->statut === 'en_attente')
                                            <span class="badge badge-warning" style="background: #ffc107; color: #000; padding: 5px 10px; border-radius: 5px;">
                                                En attente de validation
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
                                            <a href="{{ route('client.commandes.show', $commande) }}" 
                                               class="btn btn-info" 
                                               style="background: #17a2b8; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            
                                            @if($commande->statut === 'en_attente')
                                                <form action="{{ route('client.commandes.valider', $commande) }}" 
                                                      method="POST" 
                                                      style="display: inline;"
                                                      onsubmit="return confirm('Êtes-vous sûr de vouloir valider cette commande ?');">
                                                    @csrf
                                                    <button type="submit" 
                                                            style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 5px; border: none; cursor: pointer;">
                                                        <i class="fa fa-check" style="color: #fff;"></i>
                                                    </button>
                                                </form>
                                            @endif
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
