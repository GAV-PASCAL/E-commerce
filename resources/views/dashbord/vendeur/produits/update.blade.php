@extends('layouts.app')

@section('title', 'Modifier produit')

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
                <h4 class="info_form">Modifier produit</h4>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashbord.vendeur.produits.update', $produit->id) }}" class="exp" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="section_form_one">
                        <div class="form_info">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" value="{{ old('nom', $produit->nom) }}" placeholder="Nom du produit" class="input_ajout" required>
                        </div>

                        <div class="form_info">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="input_ajout" style="height: 80px;" required>{{ old('description', $produit->description) }}</textarea>
                        </div>

                        <div class="form_info">
                            <label for="url_image">URL de l'image (optionnel)</label>
                            <input type="url" name="url_image" value="{{ old('url_image', $produit->urlimg->url ?? '') }}" class="input_ajout" placeholder="https://example.com/image.jpg">
                        </div>
                    </div>

                   <div class="section_form_two">
                        <div class="form_info">
                            <label for="prix">Prix(FCFA)</label>
                            <input type="number" name="prix" value="{{ old('prix', $produit->prix) }}" class="input_ajout" min="0" step="0.01" required>
                        </div>

                        <div class="form_info">
                            <label for="qte_min">Quantité minimale</label>
                            <input type="number" name="qte_min" value="{{ old('qte_min', $produit->qte_min) }}" class="input_ajout" min="1" required>
                        </div> 
                        
                        <div class="form_info">
                            <label for="categorie_id">Catégories</label>
                            <select name="categorie_id" id="categorie_id" class="input_ajout" required>
                                <option value="">Sélectionner une catégorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ old('categorie_id', $produit->categorie_id) == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form_info">
                            <label for="image">Image du produit (optionnel)</label>
                            @if($produit->image)
                                <p><small>Image actuelle: {{ basename($produit->image) }}</small></p>
                            @endif
                            <input type="file" name="image" id="image" class="input_file" accept="image/*">
                            <small>Laissez vide pour conserver l'image actuelle</small>
                        </div>

                        <div>
                            <input type="submit" value="Mettre à jour" class="input_register">
                            <a href="{{ route('dashbord.vendeur.produits.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Annuler</a>
                        </div>
                   </div>

                </form>
            </div>            
        </div>

    </div>

@endsection
