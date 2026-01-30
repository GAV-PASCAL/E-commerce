@extends('layouts.app')

@section('title', 'Nos Produits')

@section('header')

    <section>
        <div class="accueil_info">
            <x-header />

            <div class="exp_dim" id="info">
                <h3 class="titre_page">Nos Produits</h3>

                <p>Découvrez nos excellents produits de haute qualité</p>
            </div>
        </div>
        
    </section>

@endsection

@section('content')

    <section>
        <form method="GET" action="{{ route('produits.liste') }}">
            <div class="btq_rapide">
                <input type="search" name="search" placeholder="Rechercher Produits..." class="btq_search" value="{{ request('search') }}">
                <button type="button" class="mobile_filter_btn" onclick="toggleFilterSidebar()">
                    <i class="fa-solid fa-filter"></i>
                </button>
            </div>

            <div class="section_side">
                <div class="sidebar_filtre" id="sidebar_filtre">
                    <div class="mobile_filter_header">
                        <h3>Filtres</h3>
                        <i class="fa-solid fa-xmark" onclick="toggleFilterSidebar()"></i>
                    </div>
                    <div>
                        <h3 class="filtre">Filtre</h3>
                        <div class="trie_section">
                            <p>Trier par</p>

                            <nav id="sidebar_navigation">
                                <button type="submit" name="sort" value="populaire" id="btq_trie_option">Plus populaire</button>
                    
                                <button type="submit" name="sort" value="prix_asc" id="btq_trie_option">Prix croissant</button>
                        
                                <button type="submit" name="sort" value="prix_desc" id="btq_trie_option">Prix décroissant</button>

                                <button  type="submit" name="sort" value="recent" id="btq_trie_option">Plus récents</button>
                            </nav>
                        </div>
                        <div class="trie_categorie">
                            <p>Catégorie</p>
                            <select name="categorie_id" id="categorie_id" onchange="this.form.submit()">
                                <option value="">Tous</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ request('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <p>Filtre prix</p>
                            <div class="filtre_prix">
                                <div>
                                    <input type="number" name="prix_min" class="input_prix" placeholder="Min" value="{{ request('prix_min') }}">
                                    <p>De</p>
                                </div>
                                <div>
                                    <input type="number" name="prix_max" class="input_prix" placeholder="Max" value="{{ request('prix_max') }}">
                                    <p>À</p>
                                </div>
                                <div>
                                    <button type="submit" class="btn_discussion" id="btn" >Filtrer</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <div class="btq_content">
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
                                <p><small>Quantité min: <b>{{ $produit->qte_min }}</b> unités</small></p>
                            </div>
                            <div class="prix_produit">
                                <div class="etoiles">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div>
                                    <h6 class="prix_fixe" >{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</h6>
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
        </div>
        </div>

        <div class="pagination-container">
            {{ $produits->links() }}
        </div>
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

    function toggleFilterSidebar() {
        const sidebar = document.getElementById('sidebar_filtre');
        sidebar.classList.toggle('active');
        
        // Prevent body scrolling when filter is open
        if (sidebar.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
            // Insert overlay if not exists
            if (!document.getElementById('filter_overlay')) {
                const overlay = document.createElement('div');
                overlay.id = 'filter_overlay';
                overlay.className = 'filter_overlay';
                overlay.onclick = toggleFilterSidebar;
                document.body.appendChild(overlay);
            } else {
                 document.getElementById('filter_overlay').style.display = 'block';
            }
        } else {
            document.body.style.overflow = 'auto';
            if (document.getElementById('filter_overlay')) {
                document.getElementById('filter_overlay').style.display = 'none';
            }
        }
    }
    
    // Recherche client-side instantanée
    const searchInput = document.querySelector('.btq_search');
    const productItems = document.querySelectorAll('.section_produit_details');

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            // Si moins de 2 caractères, on réaffiche tout (ou on laisse l'état initial)
            if (searchTerm.length < 2 && searchTerm.length > 0) {
                 // Optionnel : on pourrait ne rien faire ou tout réafficher
                 // Ici on choisit de tout réafficher si l'utilisateur efface
                 productItems.forEach(item => item.style.display = '');
                 return;
            }
            
            // Si vide, on réaffiche tout
            if (searchTerm.length === 0) {
                 productItems.forEach(item => item.style.display = '');
                 return;
            }

            // Filtrage
            productItems.forEach(item => {
                const title = item.querySelector('h4').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
    </script>

@endsection
