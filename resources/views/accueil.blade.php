@extends('layouts.app')

@section('title')
    Accueil Easyorder
@endsection

@section('content')

    <section id="accueil">

        <x-header />
        <div class="bienvenue"> 
            <div>
                <div class="accroche">
                    <h1 class="hero-title">
                        <span id="typing-text"></span><span class="cursor"></span>
                    </h1>

                    <p class="hero-subtitle">
                        EasyOrder vous connecte directement et explorer les produits pour négocier, commander et conclure vos achats simplement et rapidement.
                    </p>
                </div>
            </div>

            <div class="info_accueil">
                <div class="accueil_rapide">
                    <button class="btn_rapide">Découvrez les produits</button>
                    <button class="btn_rapide_change">Comment ça marche</button>
                </div>
            </div>
        </div>
                                                                            
    </section>
        
    <section id="prq" class="reveal">
        <div class="fonction">
            <h1 class="reveal reveal-delay-1">Pourquoi Nous ?</h1>
            <p style="text-align: center;" class="reveal reveal-delay-2">
                Une plateforme complète qui réunit
                tous les acteurs du commerce en ligne pour 
                des transactions sécurisées et efficaces
            </p>
        </div>

        <div class="fonction_grid_globale">
            <div id="fonction_grid">
                @php $delay = 1; @endphp
                <div class="section_fonction reveal reveal-delay-{{ $delay++ }}">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Boutique mondiale</h3>
                    </div>

                    <p class="fonction_description">
                        Accédez à des produits du monde entier et
                        vendez à une clientèle internationale sans 
                        frontières.
                    </p>
                </div>
                <!-- ... repeat for others or just add reveal classes manually ... -->
                <div class="section_fonction reveal reveal-delay-{{ $delay++ }}">
                    <div class="fonction_details">
                        <i class="fa-solid fa-tags"></i>

                        <h3>Boutique Abordable</h3>
                    </div>

                    <p class="fonction_description">
                        Tous nos grossistes sont vérifiés pour garantir la qualité et la fiabilité de vos achats.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-{{ $delay++ }}">
                    <div class="fonction_details">
                       <i class="fa-solid fa-shield-halved"></i>

                        <h3>Transactions sécurisée</h3>
                    </div>

                    <p class="fonction_description">
                        Système de paiement sécurisé et suivi complet de vos commandes pour une tranquillité totale.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-{{ $delay++ }}">
                    <div class="fonction_details">
                       <i class="fa-solid fa-comment-dots"></i>

                        <h3>Chat intégrer</h3>
                    </div>

                    <p class="fonction_description">
                        Discutez directement avec les vendeurs pour finaliser vos commandes et négocier les détails.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-{{ $delay++ }}">
                    <div class="fonction_details">
                        <i class="fa-solid fa-percent"></i>

                        <h3>Prix compétitifs</h3>
                    </div>

                    <p class="fonction_description">
                        Bénéficiez de tarifs grossistes avantageux et de promotions exclusives régulières.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-{{ $delay++ }}">
                    <div class="fonction_details">
                        <i class="fa-solid fa-truck"></i>

                        <h3>Livraison Rapide</h3>
                    </div>

                    <p class="fonction_description">
                        Suivi en temps réel de vos commandes avec des options de livraison flexibles et rapides.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="process_section reveal">
        <div class="fonction">
            <h1 class="reveal reveal-delay-1">Comment ça marche</h1>

            <P class="reveal reveal-delay-2">Un processus simple et efficace pour commander vos produits en toute tranquilité</P>
        </div>
        <div class="process">
            @php $p_delay = 1; @endphp
            <div class="process_details reveal reveal-delay-{{ $p_delay++ }}">
                <i class="fa-solid fa-circle-user"></i>
                <h6 class="numb">01</h6>
                <h3>Créer votre compte</h3>
                <br>
                <p>Inscrivez-vous gratuitement en quelques 
                    minutes et accédez à notre catalogue de produits 
                    mondiaux.
                </p>
            </div>
            <div class="process_details reveal reveal-delay-{{ $p_delay++ }}">
                <i class="fa-solid fa-store"></i>
                <h6 class="numb">02</h6>
                <h3>Explorez les produits</h3>
                <br>
                <p>
                    Parcourez notre large sélection de produits par catégorie, prix ou boutique selon vos besoins.
                </p>
            </div>
            <div class="process_details reveal reveal-delay-{{ $p_delay++ }}">
                <i class="fa-solid fa-comments"></i>
                <h6 class="numb">03</h6>
                <h3>Discussion avec vendeur</h3>
                <br>
                <p>
                    Communiquez directement avec les grossistes pour négocier les détails de votre commande.
                </p>
            </div>
            <div class="process_details reveal reveal-delay-{{ $p_delay++ }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <h6 class="numb">04</h6>
                <h3>Passez commande</h3>
                <br>
                <p>
                    Finalisez votre achat en toute sécurité avec notre système de paiement protégé et suivez votre livraison.
                </p>
            </div>
        </div>

        <button class="btn_process reveal reveal-delay-1">
            En Savoir Plus
        </button>
    </section>

    <section class="categorie_section reveal">
        <div>
            <h2 class="voir reveal reveal-delay-1">
                Les Différentes catégories
            </h2>
        </div><br><br>
        <div id="categoryCarouselContainer" class="category-carousel-container">
            <div class="category-carousel-track" id="categoryTrack">
                @foreach($categories as $categorie)
                    <div class="category-card">
                        <a href="" class="categorie-link">
                            <img src=" {{ asset('storage/' . $categorie->image) }} " alt="" class="dim_image" > <br>
                            <h4 class="voir">{{ $categorie->nom }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="produits reveal">
        <div>
            <h2 class="reveal reveal-delay-1">Les différentes Produits</h2>
        </div>

        <div class="btq_content" id="taille">
            @forelse($produits as $produit)
                <div class="section_produit_details">
                    <a href="{{ route('produit.show', $produit->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="btq_section_image">
                            @if($produit->image)
                                <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="produit_image">
                            @elseif($produit->urlimg)
                                <img src="{{ $produit->urlimg->url }}" alt="{{ $produit->nom }}" class="produit_image">
                            @else
                                <img src="https://via.placeholder.com/300" alt="{{ $produit->nom }}" class="produit_image">
                            @endif
                            @auth
                                <i class="fa-regular fa-heart favorite-icon" data-produit-id="{{ $produit->id }}" style="cursor: pointer;"></i>
                            @else
                                <i class="fa-regular fa-heart" style="cursor: pointer;" onclick="window.location.href='{{ route('login') }}'"></i>
                            @endauth 
                        </div>
                        <div class="image_info">
                            <div>
                                <h4>{{ $produit->nom }}</h4>
                            </div>
                            <div>
                                <p><small>Quantité min: {{ $produit->qte_min }} unités</small></p>
                            </div>
                            <div class="prix_produit">
                                <div class="etoiles">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div>
                                    <h5 class="prix_fixe" >{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="btn_section">
                        @auth
                            <button type="button" class="btn_discussion" onclick="window.location.href='{{ route('conversations.start', $produit->id) }}'">Discuter</button>
                            <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='{{ route('produit.show', $produit->id) }}'">Voir détails</button>
                        @else
                            <button type="button" class="btn_discussion" onclick="window.location.href='{{ route('login') }}'">Discuter</button>
                            <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='{{ route('login') }}'">Proposition</button>
                        @endauth
                    </div>
                </div>
            @empty
                <div class="text-center w-100">
                    <p>Aucun produit disponible pour le moment.</p>
                </div>
            @endforelse
        </div><br><br>
    </section>

    <x-footer/>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Charger l'état des favoris au chargement de la page
        @auth
        loadFavorites();
        @endauth

        // Gérer le clic sur les icônes de favoris
        document.querySelectorAll('.favorite-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const produitId = this.dataset.produitId;
                toggleFavorite(produitId, this);
            });
        });
    });

    function loadFavorites() {
        fetch('{{ route("favoris.ids") }}')
            .then(response => response.json())
            .then(data => {
                const favoriteIds = data.favorite_ids;
                
                document.querySelectorAll('.favorite-icon').forEach(icon => {
                    const produitId = parseInt(icon.dataset.produitId);
                    if (favoriteIds.includes(produitId)) {
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid', 'active');
                    }
                });
            })
            .catch(error => {
                console.error('Erreur lors du chargement des favoris:', error);
            });
    }

    function toggleFavorite(produitId, iconElement) {
        fetch('{{ route("favoris.toggle") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                produit_id: produitId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.action === 'added') {
                    iconElement.classList.remove('fa-regular');
                    iconElement.classList.add('fa-solid', 'active');
                } else {
                    iconElement.classList.remove('fa-solid', 'active');
                    iconElement.classList.add('fa-regular');
                }
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }

    // Scroll Reveal Logic
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
    // Trigger once on load
    reveal();
    </script>

@endsection
