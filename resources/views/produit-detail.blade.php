@extends('layouts.app')

@section('title', $produit->nom)

@section('header')
    <section>
        <div class="accueil_info">
            <x-header />

            <div class="exp_dim" id="info">
                <h3 class="titre_page">{{ $produit->nom }}</h3>
                <p>{{ $produit->categorie->nom ?? 'Produit' }}</p>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section>
        <div class="produit-detail-container">
            <div class="produit-images">
                @if($produit->image)
                    <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="main-image" width="300px" height="300px">
                @elseif($produit->urlimg)
                    <img src="{{ $produit->urlimg->url }}" alt="{{ $produit->nom }}" class="main-image">
                @endif

                <i class="fa-regular fa-heart"></i>
                
                <!-- <div class="thumbnails">
                    @if($produit->image)
                        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="thumb active">
                    @endif
                </div> -->
            </div>

            <div class="produit-info">
                <h2> Nom : {{ $produit->nom }}</h2>
                <h4 class="categorie">Catégorie: {{ $produit->categorie->nom ?? 'N/A' }}</h4>
                
                <div class="prix-section">
                    <h2>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</h2>
                    <h5>Quantité minimale: {{ $produit->qte_min }} unités</h5>
                </div>

                <div class="description">
                    <h3>Description</h3>
                    <h5>{{ $produit->description }}</h5>
                </div>

                <div class="actions">
                    @auth
                        <button class="btn_discussion" onclick="window.location.href='{{ route('conversations.start', $produit->id) }}'">Discuter avec le vendeur</button>
                        <button class="btn_discussion" onclick="window.location.href='#'">Faire une proposition de prix</button>
                    @else
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">Connectez-vous pour discuter</button>
                    @endauth

                </div>
            </div>
        </div>

        @if($produitsRelated->count() > 0)
        <div class="related-products">
            <h3>Produits similaires</h3>
            <div class="btq_content">
                @foreach($produitsRelated as $related)
                    <div class="section_produit_details">
                        <a href="{{ route('produit.show', $related->id) }}" style="text-decoration: none; color: inherit;">
                            <div class="btq_section_image">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->nom }}" class="produit_image">
                                @elseif($related->urlimg)
                                    <img src="{{ $related->urlimg->url }}" alt="{{ $related->nom }}" class="produit_image">
                                @else
                                    <img src="https://via.placeholder.com/300" alt="{{ $related->nom }}" class="produit_image">
                                @endif
                            </div>
                            <div class="image_info">
                                <div>
                                    <h4>{{ $related->nom }}</h4>
                                </div>
                                <div class="prix_produit">
                                    <h5 class="prix_fixe" >{{ number_format($related->prix, 0, ',', ' ') }} FCFA</h5>
                                </div>
                                <div>
                                    <div class="etoiles">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="btn_section">
                            <button type="button" class="btn_discussion" onclick="window.location.href='{{ route('conversations.start', $produit->id) }}'">Discuter</button>
                            <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='{{ route('produit.show', $produit->id) }}'">Voir détails</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>

    <x-footer/>
@endsection