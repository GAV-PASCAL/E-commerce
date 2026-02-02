@extends('layouts.app')

@section('title', $produit->nom)

@section('header')
    <section>
        <div class="accueil_info">
            <x-header />

            <div class="exp_dim" id="info">
                <h3 class="titre_page">Détails du Produit</h3>
                <div class="breadcrumb">
                    <a href="{{ url('/') }}">Accueil</a> 
                    <i class="fa-solid fa-chevron-right"></i> 
                    <a href="{{ route('produits.liste') }}">Boutique</a>
                    <i class="fa-solid fa-chevron-right"></i> 
                    <span>{{ $produit->nom }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="product-detail-view">
        <div class="container">
            <div class="product-main-grid">
                <!-- Image Side -->
                <div class="product-gallery">
                    <div class="main-image-wrapper tilt-element" onclick="openLightbox()">
                        @if($produit->image)
                            <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="product-featured-image" id="target-img">
                        @elseif($produit->urlimg)
                            <img src="{{ $produit->urlimg->url }}" alt="{{ $produit->nom }}" class="product-featured-image" id="target-img">
                        @else
                            <img src="https://via.placeholder.com/600" alt="{{ $produit->nom }}" class="product-featured-image" id="target-img">
                        @endif
                        
                        <div class="click-to-zoom">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                            <span>Cliquez pour agrandir</span>
                        </div>

                        @auth
                            <button class="fav-action-btn favorite-icon" data-produit-id="{{ $produit->id }}" onclick="event.stopPropagation();">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        @else
                            <button class="fav-action-btn" onclick="event.stopPropagation(); window.location.href='{{ route('login') }}'">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        @endauth
                    </div>
                </div>

                <!-- Info Side -->
                <div class="product-essential-info">
                    <div class="product-badge">{{ $produit->categorie->nom ?? 'Produit' }}</div>
                    <h1 class="product-title">{{ $produit->nom }}</h1>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <span class="reviews-count">(4.8/5 - 24 avis)</span>
                    </div>

                    <div class="price-box">
                        <span class="current-price">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</span>
                        <div class="stock-info">
                            <i class="fa-solid fa-circle-check"></i> En stock
                        </div>
                    </div>

                    <div class="order-constraints">
                        <div class="constraint-item">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <span>Quantité minimale : <strong>{{ $produit->qte_min }} unités</strong></span>
                        </div>
                    </div>

                    <div class="product-actions">
                        @auth
                            <button class="main-cta-btn" onclick="window.location.href='{{ route('conversations.start', $produit) }}'">
                                <i class="fa-solid fa-comments"></i> Discuter avec le vendeur
                            </button>
                        @else
                            <button class="main-cta-btn secondary" onclick="window.location.href='{{ route('login') }}'">
                                <i class="fa-solid fa-right-to-bracket"></i> Connectez-vous pour discuter
                            </button>
                        @endauth
                    </div>

                    <div class="trust-signals">
                        <div class="signal">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Paiement Sécurisé</span>
                        </div>
                        <div class="signal">
                            <i class="fa-solid fa-truck-fast"></i>
                            <span>Livraison Express</span>
                        </div>
                        <div class="signal">
                            <i class="fa-solid fa-award"></i>
                            <span>Qualité Vérifiée</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Block -->
            <div class="product-details-extra">
                <div class="details-tabs">
                    <button class="tab-btn active">Description</button>
                </div>
                <div class="tab-content">
                    <p>{{ $produit->description }}</p>
                </div>
            </div>

            @if($produitsRelated->count() > 0)
            <div class="related-section">
                <h2 class="section-title">Produits similaires</h2>
                <div class="btq_content">
                    @foreach($produitsRelated as $related)
                        <div class="section_produit_details">
                            <a href="{{ route('produit.show', $related) }}" style="text-decoration: none; color: inherit;">
                                <div class="btq_section_image">
                                    @if($related->image)
                                        <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->nom }}" class="produit_image">
                                    @elseif($related->urlimg)
                                        <img src="{{ $related->urlimg->url }}" alt="{{ $related->nom }}" class="produit_image">
                                    @else
                                        <img src="https://via.placeholder.com/300" alt="{{ $related->nom }}" class="produit_image">
                                    @endif
                                    @auth
                                        <i class="fa-regular fa-heart favorite-icon" data-produit-id="{{ $related->id }}" style="cursor: pointer;"></i>
                                    @else
                                        <i class="fa-regular fa-heart" style="cursor: pointer;" onclick="window.location.href='{{ route('login') }}'"></i>
                                    @endauth 
                                </div>
                                <div class="image_info">
                                    <div>
                                        <h4>{{ $related->nom }}</h4>
                                    </div>
                                    <div>
                                        <p><small>Quantité min: <b>{{ $related->qte_min }}</b> unités</small></p>
                                    </div>
                                    <div class="prix_produit">
                                        <div class="etoiles">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <div>
                                            <h6 class="prix_fixe" >{{ number_format($related->prix, 0, ',', ' ') }} FCFA</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="btn_section">
                                @auth
                                    <button type="button" class="btn_discussion" onclick="window.location.href='{{ route('conversations.start', $related) }}'">Discuter</button>
                                @else
                                    <button type="button" class="btn_discussion" onclick="window.location.href='{{ route('login') }}'">Discuter</button>
                                @endauth
                                <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='{{ route('produit.show', $related) }}'">Voir détails</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="productLightbox" class="lightbox-modal" onclick="closeLightbox()">
        <span class="close-lightbox">&times;</span>
        <div class="lightbox-content-wrapper" onclick="event.stopPropagation()">
            <img class="lightbox-content" id="imgLightbox">
            <div id="caption"></div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @auth
        loadFavorites();
        @endauth

        document.querySelectorAll('.favorite-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                const produitId = this.dataset.produitId;
                toggleFavorite(produitId, this);
            });
        });

        // Effect 3D Tilt
        const tiltEffect = document.querySelector('.tilt-element');
        if(tiltEffect) {
            tiltEffect.addEventListener('mousemove', (e) => {
                const { width, height, left, top } = tiltEffect.getBoundingClientRect();
                const x = e.clientX - left;
                const y = e.clientY - top;
                const xc = width / 2;
                const yc = height / 2;
                const dx = x - xc;
                const dy = y - yc;
                
                tiltEffect.style.transform = `perspective(1000px) rotateY(${dx / 15}deg) rotateX(${-dy / 15}deg) scale3d(1.02, 1.02, 1.02)`;
            });

            tiltEffect.addEventListener('mouseleave', () => {
                tiltEffect.style.transform = `perspective(1000px) rotateY(0deg) rotateX(0deg) scale3d(1, 1, 1)`;
            });
        }
    });

    function openLightbox() {
        const modal = document.getElementById("productLightbox");
        const img = document.getElementById("target-img");
        const modalImg = document.getElementById("imgLightbox");
        const captionText = document.getElementById("caption");
        
        modal.style.display = "flex";
        setTimeout(() => modal.classList.add('active'), 10);
        modalImg.src = img.src;
        captionText.innerHTML = "{{ $produit->nom }}";
        document.body.style.overflow = 'hidden'; // Prevent scroll
    }

    function closeLightbox() {
        const modal = document.getElementById("productLightbox");
        modal.classList.remove('active');
        setTimeout(() => modal.style.display = "none", 300);
        document.body.style.overflow = 'auto';
    }

    function loadFavorites() {
        fetch('{{ route("favoris.ids") }}')
            .then(response => response.json())
            .then(data => {
                const favoriteIds = data.favorite_ids;
                document.querySelectorAll('.favorite-icon').forEach(icon => {
                    const produitId = parseInt(icon.dataset.produitId);
                    if (favoriteIds.includes(produitId)) {
                        const i = icon.querySelector('i');
                        i.classList.remove('fa-regular');
                        i.classList.add('fa-solid', 'active');
                        icon.classList.add('is-active');
                    }
                });
            });
    }

    function toggleFavorite(produitId, iconElement) {
        fetch('{{ route("favoris.toggle") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ produit_id: produitId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const i = iconElement.querySelector('i');
                if (data.action === 'added') {
                    i.classList.remove('fa-regular');
                    i.classList.add('fa-solid', 'active');
                    iconElement.classList.add('is-active');
                } else {
                    i.classList.remove('fa-solid', 'active');
                    i.classList.add('fa-regular');
                    iconElement.classList.remove('is-active');
                }
            }
        });
    }
    </script>

    <x-footer/>
@endsection