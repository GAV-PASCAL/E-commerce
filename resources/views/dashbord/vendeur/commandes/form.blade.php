@extends('layouts.app')

@section('title', 'Informations du client')

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
                <h4 class="info_form">Informations du client pour la commande</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Résumé des produits sélectionnés -->
                <div class="alert alert-info">
                    <h5>Produits sélectionnés :</h5>
                    <ul>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($produitsSelectionnes as $produitData)
                            @php
                                $produit = \App\Models\Produits::find($produitData['id']);
                                $sousTotal = $produitData['prix_unitaire'] * $produitData['quantite'];
                                $total += $sousTotal;
                            @endphp
                            <li>
                                <strong>{{ $produit->nom }}</strong> - 
                                {{ $produitData['quantite'] }} x {{ number_format($produitData['prix_unitaire'], 0, ',', ' ') }} FCFA = 
                                <strong>{{ number_format($sousTotal, 0, ',', ' ') }} FCFA</strong>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                    <h5>Montant total : <strong>{{ number_format($total, 0, ',', ' ') }} FCFA</strong></h5>
                </div>

                <form action="{{ route('commandes.store') }}" class="exp" method="POST">
                    @csrf

                   <div class="section_form_two">
                        <div class="form_info">
                            <label for="email_client">Email du client *</label>
                            <input type="email" 
                                   name="email_client" 
                                   id="email_client"
                                   value="{{ old('email_client') }}" 
                                   class="input_ajout" 
                                   placeholder="exemple@email.com"
                                   required>
                            <small>Le client doit avoir un compte sur la plateforme</small>
                        </div>

                        <div class="form_info">
                            <label for="date_commande">Date de la commande *</label>
                            <input type="date" 
                                   name="date_commande" 
                                   id="date_commande"
                                   value="{{ old('date_commande', date('Y-m-d')) }}" 
                                   class="input_ajout" 
                                   required>
                        </div>

                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('commandes.create') }}" class="btn btn-secondary">
                                Retour à la sélection
                            </a>
                            <button type="submit" class="input_register">
                                Créer la fiche de commande
                            </button>
                        </div>
                   </div>

                </form>
            </div>            
        </div>

    </div>

@endsection
