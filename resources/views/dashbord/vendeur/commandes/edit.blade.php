@extends('layouts.app')

@section('title', 'Modifier la commande')

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
                <x-dashheader/>
            </div>
        </div>

        <div class="section_dash">

            <div id="back_formulaire">
                <h6 class="info_form">Modifier la commande {{ $commande->numero_fiche }}</h6>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="alert alert-info">
                    <strong>Client :</strong> {{ $commande->user->nom }} {{ $commande->user->prenom }} ({{ $commande->user->email }})
                </div>

                <form action="{{ route('commandes.update', $commande->id) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="section_form_two">
                        <div class="form_info">
                            <label for="date_commande">Date de la commande *</label>
                            <input type="date" 
                                   name="date_commande" 
                                   id="date_commande"
                                   value="{{ old('date_commande', $commande->date_commande->format('Y-m-d')) }}" 
                                   class="input_ajout" 
                                   required>
                        </div>
                    </div>

                    <h5 style="margin-top: 30px; margin-bottom: 15px;">Produits de la commande</h5>
                    
                    <div class="produit_search">
                        <input type="search" id="searchInput" placeholder="Rechercher un produit" class="produit_search_input">
                    </div>

                    <table class="table_dash">
                        <thead>
                            <tr>
                                <th class="test">Sélection</th>
                                <th>Nom du produit</th>
                                <th>Catégorie</th>
                                <th>Prix Unitaire (FCFA)</th>
                                <th>Quantité</th>
                            </tr>
                        </thead>

                        <tbody id="produitsTable">
                            @php
                                $produitsCommande = $commande->produits->pluck('id')->toArray();
                            @endphp
                            @foreach($produits as $produit)
                                @php
                                    $isSelected = in_array($produit->id, $produitsCommande);
                                    $produitCommande = $isSelected ? $commande->produits->firstWhere('id', $produit->id) : null;
                                @endphp
                                <tr class="produit-row" data-nom="{{ strtolower($produit->nom) }}">
                                    <td>
                                        <input type="checkbox" 
                                               class="produit-checkbox" 
                                               data-id="{{ $produit->id }}" 
                                               value="{{ $produit->id }}"
                                               {{ $isSelected ? 'checked' : '' }}>
                                    </td>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->categorie->nom ?? 'N/A' }}</td>
                                    <td>
                                        <input type="number" 
                                               class="input_number prix-input" 
                                               data-id="{{ $produit->id }}"
                                               name="produits[{{ $produit->id }}][prix_unitaire]" 
                                               placeholder="Prix"
                                               min="0"
                                               step="0.01"
                                               value="{{ $isSelected ? $produitCommande->pivot->prix_unitaire : '' }}"
                                               {{ $isSelected ? '' : 'disabled' }}>
                                    </td>
                                    <td>
                                        <input type="number" 
                                               class="input_number quantite-input" 
                                               data-id="{{ $produit->id }}"
                                               name="produits[{{ $produit->id }}][quantite]" 
                                               placeholder="Qté"
                                               min="1"
                                               value="{{ $isSelected ? $produitCommande->pivot->quantite : '' }}"
                                               {{ $isSelected ? '' : 'disabled' }}>
                                        <input type="hidden" name="produits[{{ $produit->id }}][id]" value="{{ $produit->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <a href="{{ route('commandes.index') }}" 
                           class="btn btn-secondary" 
                           style="background: #ffffffff; color: #B45309; font-weight: bold; padding: 10px 20px; border-radius: 5px; border: 2px solid #B45309 ; text-decoration: none;">
                            Retour
                        </a>
                        <button type="submit" class="input_register" id="submitBtn">
                            Mettre à jour la commande
                        </button>
                    </div>

                </form>

            </div>            
        </div>

    </div>

    <script>
        // Gestion de la recherche
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.produit-row');
            
            rows.forEach(row => {
                const nom = row.getAttribute('data-nom');
                if (nom.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Gestion des checkboxes et inputs
        document.querySelectorAll('.produit-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const produitId = this.getAttribute('data-id');
                const prixInput = document.querySelector(`.prix-input[data-id="${produitId}"]`);
                const quantiteInput = document.querySelector(`.quantite-input[data-id="${produitId}"]`);
                
                if (this.checked) {
                    prixInput.disabled = false;
                    quantiteInput.disabled = false;
                    prixInput.required = true;
                    quantiteInput.required = true;
                } else {
                    prixInput.disabled = true;
                    quantiteInput.disabled = true;
                    prixInput.required = false;
                    quantiteInput.required = false;
                    prixInput.value = '';
                    quantiteInput.value = '';
                }
                
                updateSubmitButton();
            });
        });

        // Activer/désactiver le bouton submit
        function updateSubmitButton() {
            const checkedBoxes = document.querySelectorAll('.produit-checkbox:checked');
            const submitBtn = document.getElementById('submitBtn');
            
            if (checkedBoxes.length > 0) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        // Validation avant soumission
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const checkedBoxes = document.querySelectorAll('.produit-checkbox:checked');
            
            if (checkedBoxes.length === 0) {
                e.preventDefault();
                alert('Veuillez sélectionner au moins un produit.');
                return false;
            }
            
            let isValid = true;
            
            checkedBoxes.forEach(checkbox => {
                const produitId = checkbox.getAttribute('data-id');
                const prixInput = document.querySelector(`.prix-input[data-id="${produitId}"]`);
                const quantiteInput = document.querySelector(`.quantite-input[data-id="${produitId}"]`);
                
                if (!prixInput.value || parseFloat(prixInput.value) <= 0) {
                    isValid = false;
                    alert('Veuillez renseigner un prix valide pour tous les produits sélectionnés.');
                    return false;
                }
                
                if (!quantiteInput.value || parseInt(quantiteInput.value) <= 0) {
                    isValid = false;
                    alert('Veuillez renseigner une quantité valide pour tous les produits sélectionnés.');
                    return false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>

@endsection
