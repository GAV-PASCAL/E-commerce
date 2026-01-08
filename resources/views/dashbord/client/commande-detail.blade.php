@extends('layouts.app')

@section('title', 'Détails de la commande')

@section('header')

    <div class="title_dash">
        <h1>DASHBOARD</h1>
    </div>

@endsection

@section('content')

    <div id="page_structure">
        <x-client/>

        <div class="section_dash">
            <x-dashnav/>

            <div class="back_formulaire">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h4 class="info_form">Fiche de Commande {{ $commande->numero_fiche }}</h4>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('commandes.pdf', $commande->id) }}" 
                           class="btn btn-success" 
                           style="background: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                            📄 Télécharger PDF
                        </a>
                        <a href="{{ route('client.commandes') }}" 
                           class="btn btn-secondary" 
                           style="background: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                            Retour
                        </a>
                    </div>
                </div>

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
                            <strong>Votre nom :</strong> {{ $commande->user->nom }} {{ $commande->user->prenom }}
                        </div>
                        <div>
                            <strong>Votre email :</strong> {{ $commande->user->email }}
                        </div>
                        <div>
                            <strong>Statut :</strong> 
                            @if($commande->statut === 'en_attente')
                                <span style="background: #ffc107; color: #000; padding: 5px 10px; border-radius: 5px;">
                                    En attente de validation
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

                <!-- Bouton de validation -->
                @if($commande->statut === 'en_attente')
                    <div style="margin-top: 30px; padding: 20px; background: #fff3cd; border-radius: 10px; border: 2px solid #ffc107;">
                        <h5 style="color: #856404; margin-bottom: 15px;">⚠️ Action requise</h5>
                        <p style="color: #856404; margin-bottom: 15px;">
                            Cette commande est en attente de votre validation. Veuillez vérifier les détails ci-dessus et accepter la commande si tout est correct.
                        </p>
                        <form action="{{ route('client.commandes.valider', $commande->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir valider cette commande ? Cette action est irréversible.');">
                            @csrf
                            <button type="submit" 
                                    class="input_register" 
                                    style="background: #28a745; padding: 15px 30px; font-size: 1.1em;">
                                ✓ Accepter cette commande
                            </button>
                        </form>
                    </div>
                @elseif($commande->statut === 'validee')
                    <div style="margin-top: 30px; padding: 20px; background: #d4edda; border-radius: 10px; border: 2px solid #28a745;">
                        <h5 style="color: #155724; margin-bottom: 10px;">✓ Commande validée</h5>
                        <p style="color: #155724; margin-bottom: 0;">
                            Vous avez validé cette commande le {{ $commande->updated_at->format('d/m/Y à H:i') }}.
                        </p>
                    </div>
                @endif

            </div>            
        </div>

    </div>

@endsection
