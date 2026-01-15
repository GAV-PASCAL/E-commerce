@extends('layouts.app')

@section('title', 'Créer une fiche de commande')

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
            <section id="head_search">

                <div class="produit_search">
                    <div class="produit_search">
                        <input type="search" id="searchInput" placeholder="Rechercher un produit" class="produit_search_input">
                    </div>
                </div>
            </section>

            <div id="back_formulaire">

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

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('commandes.store-selection') }}" method="POST" id="commandeForm">
                    @csrf

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
                            @foreach($produits as $produit)
                                <tr class="produit-row" data-nom="{{ strtolower($produit->nom) }}">
                                    <td>
                                        <input type="checkbox" class="produit-checkbox" data-id="{{ $produit->id }}" value="{{ $produit->id }}">
                                    </td>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->categorie->nom ?? 'N/A' }}</td>
                                    <td>
                                        <input type="number" 
                                               class="input_number prix-input" 
                                               data-id="{{ $produit->id }}"
                                               placeholder="Prix"
                                               min="0"
                                               step="0.01"
                                               disabled>
                                    </td>
                                    <td>
                                        <input type="number" 
                                               class="input_number quantite-input" 
                                               data-id="{{ $produit->id }}"
                                               placeholder="Qté"
                                               min="1"
                                               disabled>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div style="margin-top: 20px; text-align: right;">
                        <button type="submit" class="input_register" id="submitBtn" disabled>
                            Continuer vers le formulaire client
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

        // Validation et nettoyage avant soumission
        document.getElementById('commandeForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Empêcher la soumission par défaut
            
            const checkedBoxes = document.querySelectorAll('.produit-checkbox:checked');
            let isValid = true;
            let produitsData = [];
            
            // Valider et collecter les données des produits sélectionnés
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
                
                // Collecter les données valides
                produitsData.push({
                    id: produitId,
                    prix_unitaire: prixInput.value,
                    quantite: quantiteInput.value
                });
            });
            
            if (!isValid) {
                return;
            }
            
            // Nettoyer le formulaire et n'ajouter que les produits sélectionnés
            const form = this;
            
            // Supprimer tous les anciens inputs de produits
            form.querySelectorAll('input[name^="produits["]').forEach(input => {
                input.remove();
            });
            
            
            // Ajouter uniquement les produits sélectionnés avec un index séquentiel
            produitsData.forEach((produit, index) => {
                // Créer les inputs cachés pour chaque produit
                const inputId = document.createElement('input');
                inputId.type = 'hidden';
                inputId.name = `produits[${index}][id]`;
                inputId.value = produit.id;
                form.appendChild(inputId);
                
                const inputPrix = document.createElement('input');
                inputPrix.type = 'hidden';
                inputPrix.name = `produits[${index}][prix_unitaire]`;
                inputPrix.value = produit.prix_unitaire;
                form.appendChild(inputPrix);
                
                const inputQuantite = document.createElement('input');
                inputQuantite.type = 'hidden';
                inputQuantite.name = `produits[${index}][quantite]`;
                inputQuantite.value = produit.quantite;
                form.appendChild(inputQuantite);
                
                console.log(`Produit ${index}:`, {
                    id: produit.id,
                    prix_unitaire: produit.prix_unitaire,
                    quantite: produit.quantite
                });
            });
            
            console.log('Données à envoyer:', produitsData);
            console.log('Formulaire avant soumission:', new FormData(form));
            
            // Soumettre le formulaire
            form.submit();
        });
    </script>

@endsection