@extends('layouts.app')

@section('title', 'Ajouter produits')

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
                <h4 class="info_form">Formulaire de création de produits</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashbord.vendeur.produits.store') }}" class="exp" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="section_form_one">
                        <div class="form_info">
                            <label for="nom">Nom du produit</label>
                            <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Nom du produit" class="input_ajout" required>
                        </div>

                        <div class="form_info">
                            <label for="description">Description du produit</label>
                            <textarea name="description" id="description" class="input_ajout" style="height: 80px;" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form_info">
                            <label for="url_image">URL de l'image (optionnel)</label>
                            <input type="url" name="url_image" value="{{ old('url_image') }}" class="input_ajout" placeholder="https://example.com/image.jpg">
                        </div>
                    </div>

                   <div class="section_form_two">
                        <div class="form_info">
                            <label for="prix">Prix du produit (FCFA)</label>
                            <input type="number" name="prix" value="{{ old('prix') }}" class="input_ajout" min="0" step="0.01" required>
                        </div>

                        <div class="form_info">
                            <label for="qte_min">Quantité minimale</label>
                            <input type="number" name="qte_min" value="{{ old('qte_min') }}" class="input_ajout" min="1" required>
                        </div> 
                        
                        <div class="form_info">
                            <label for="categorie_id">Catégorie</label>
                            <select name="categorie_id" id="categorie_id" class="input_ajout" required>
                                <option value="">Sélectionner une catégorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form_info">
                            <label for="image">Image du produit (optionnel)</label>
                            <input type="file" name="image" id="image" class="input_file" accept="image/*">
                        </div>

                        <div>
                            <input type="submit" value="Enregistrer" class="input_register">
                        </div>
                   </div>

                </form>
            </div>            
        </div>

    </div>

@endsection
