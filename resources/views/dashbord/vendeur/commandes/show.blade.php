@extends('layouts.app')

@section('title', 'Détails de la commande')

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

            <div class="back_formulaire">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h6 class="info_form">Fiche de Commande {{ $commande->numero_fiche }}</h6>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('commandes.pdf', $commande->id) }}" 
                           class="btn btn-success" 
                           style="background: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                            📄 Télécharger PDF
                        </a>
                        <a href="{{ route('commandes.index') }}" 
                           class="btn btn-secondary" 
                           style="background: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                            Retour
                        </a>
                    </div>
                </div>

                <!-- Informations générales -->
                <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
                    <h5 style="margin-bottom: 15px; color: #333;">Informations de la commande</h5>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                        <div>
                            <strong>Numéro de fiche :</strong> {{ $commande->numero_fiche }}
                        </div>
                        <div>
                            <strong>Date :</strong> {{ $commande->date_commande->format('d/m/Y') }}
                        </div>
                        <div>
                            <strong>Client :</strong> {{ $commande->user->nom }} {{ $commande->user->prenom }}
                        </div>
                        <div>
                            <strong>Email :</strong> {{ $commande->user->email }}
                        </div>
                        <div>
                            <strong>Statut :</strong> 
                            @if($commande->statut === 'en_attente')
                                <span style="background: #ffc107; color: #000; padding: 5px 10px; border-radius: 5px;">
                                    En attente
                                </span>
                            @elseif($commande->statut === 'validee')
                                <span style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                    Validée
                                </span>
                            @else
                                <span style="background: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                    Annulée
                                </span>
                            @endif
                        </div>
                        <div>
                            <strong>Montant total :</strong> 
                            <span style="font-size: 1.2em; color: #28a745;">
                                {{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Liste des produits -->
                <h5 style="margin-bottom: 15px; color: #333;">Produits commandés</h5>
                <table class="table_dash">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commande->produits as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ number_format($produit->pivot->prix_unitaire, 0, ',', ' ') }} FCFA</td>
                                <td>{{ $produit->pivot->quantite }}</td>
                                <td>{{ number_format($produit->pivot->prix_total, 0, ',', ' ') }} FCFA</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold; background: #f8f9fa;">
                            <td colspan="3" style="text-align: right;">TOTAL :</td>
                            <td>{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</td>
                        </tr>
                    </tfoot>
                </table>

            </div>            
        </div>

    </div>

@endsection
