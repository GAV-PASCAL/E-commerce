@extends('layouts.app')

@section('title', 'Ajouter produits')

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

        <div class="section_dash" id="pate">
            
            <div id="back_formulaire" style="max-width: 1500px; margin: 0 auto;">
                <h6 class="info_form">Création d'un nouveau produit</h6>

                @if($errors->any())
                    <div class="alert alert-danger" style="margin-bottom: 20px; border-radius: 12px;">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashbord.vendeur.produits.store') }}" method="POST" enctype="multipart/form-data" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                    @csrf

                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
                        
                        <!-- Colonne Gauche -->
                        <div style="display: flex; flex-direction: column; gap: 30px;">
                            
                            <!-- Informations Principales -->
                            <div class="section-card">
                                <h5 style="color: #92400E; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                                    <i class="fa-solid fa-box-open" style="margin-right: 10px;"></i>
                                    Informations de base
                                </h5>

                                <div style="display: flex; flex-direction: column; gap: 20px;">
                                    <div class="form_info">
                                        <label for="nom" style="font-weight: 600; color: #374151;">Nom du produit <span style="color: #dc2626;">*</span></label>
                                        <div style="position: relative;">
                                            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" placeholder="Ex: Chaise de bureau ergonomique" class="input_ajout" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;" required>
                                        </div>
                                    </div>

                                    <div class="form_info">
                                        <label for="description" style="font-weight: 600; color: #374151;">Description détaillée <span style="color: #dc2626;">*</span></label>
                                        <div style="position: relative;">
                                            <textarea name="description" id="description" class="input_ajout" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; min-height: 120px;" placeholder="Décrivez votre produit..." required>{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Prix et Stock -->
                            <div class="section-card">
                                <h5 style="color: #92400E; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                                    <i class="fa-solid fa-tags" style="margin-right: 10px;"></i>
                                    Tarification et Stock
                                </h5>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                    <div class="form_info">
                                        <label for="prix" style="font-weight: 600; color: #374151;">Prix (FCFA) <span style="color: #dc2626;">*</span></label>
                                        <div style="position: relative;">
                                            <input type="number" name="prix" id="prix" value="{{ old('prix') }}" class="input_ajout" min="0" step="1" placeholder="0" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;" required>
                                        </div>
                                    </div>

                                    <div class="form_info">
                                        <label for="qte_min" style="font-weight: 600; color: #374151;">Quantité Min. <span style="color: #dc2626;">*</span></label>
                                        <div style="position: relative;">
                                            <input type="number" name="qte_min" id="qte_min" value="{{ old('qte_min', 1) }}" class="input_ajout" min="1" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Colonne Droite (Catégorie & Images) -->
                        <div style="display: flex; flex-direction: column; gap: 30px;">
                            
                            <!-- Catégorie -->
                            <div class="section-card">
                                <h5 style="color: #92400E; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                                    <i class="fa-solid fa-layer-group" style="margin-right: 10px;"></i>
                                    Catégorisation
                                </h5>
                                
                                <div class="form_info">
                                    <label for="categorie_id" style="font-weight: 600; color: #374151;">Catégorie <span style="color: #dc2626;">*</span></label>
                                    <div style="position: relative;">
                                        <select name="categorie_id" id="categorie_id" class="input_ajout" style="width: 100%; padding: 0 12px; border: 1px solid #d1d5db; border-radius: 8px; appearance: none; background-color: white;" required>
                                            <option value="">Sélectionner...</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                                    {{ $categorie->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="fa-solid fa-chevron-down" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #9ca3af; pointer-events: none;"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="section-card">
                                <h5 style="color: #92400E; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                                    <i class="fa-solid fa-images" style="margin-right: 10px;"></i>
                                    Visuels
                                </h5>

                                <div class="form_info" style="margin-bottom: 20px;">
                                    <label for="url_image" style="font-weight: 600; color: #374151;">URL de l'image (Optionnel)</label>
                                    <div style="position: relative;">
                                        <input type="url" name="url_image" id="url_image" value="{{ old('url_image') }}" class="input_ajout" placeholder="https://..." style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px;">
                                    </div>
                                </div>

                                <div class="form_info">
                                    <label for="image" style="font-weight: 600; color: #374151;">Ou Télécharger une image</label>
                                    <div style="border: 2px dashed #d1d5db; border-radius: 8px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.borderColor='#B45309'; this.style.backgroundColor='#fff7ed';" onmouseout="this.style.borderColor='#d1d5db'; this.style.backgroundColor='transparent';">
                                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 2rem; color: #B45309; margin-bottom: 10px;"></i>
                                        <input type="file" name="image" id="image" class="input_file" accept="image/*" style="width: 100%;">
                                        <p style="margin-top: 5px; font-size: 0.8rem; color: #6b7280;">PNG, JPG, GIF jusqu'à 2MB</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Actions -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid #f3f4f6;">
                        <a href="{{ route('dashbord.vendeur.produits.index') }}" class="btn btn-secondary" style="background: white; color: #B45309; font-weight: bold; padding: 12px 25px; border-radius: 8px; border: 2px solid #B45309; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-arrow-left"></i> Annuler
                        </a>
                        <button type="submit" style="background: #B45309; color: white; padding: 12px 40px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 1rem; box-shadow: 0 4px 6px -1px rgba(180, 83, 9, 0.2); transition: all 0.3s; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-save"></i> Enregistrer le produit
                        </button>
                    </div>

                </form>
            </div>            
        </div>
    </div>

@endsection
