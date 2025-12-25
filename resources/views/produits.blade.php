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
            </div>

            <div class="section_side">
                <div class="sidebar_filtre">
                    <div>
                        <h3 class="filtre">Filtre</h3>
                        <div class="trie_section">
                            <p>Trier par</p>

                            <nav id="sidebar_navigation">
                                <button type="submit" name="sort" value="populaire" class="side_nav" id="btq_trie_option">Plus populaire</button>
                    
                                <button type="submit" name="sort" value="prix_asc" class="side_nav" id="btq_trie_option">Prix croissant</button>
                        
                                <button type="submit" name="sort" value="prix_desc" class="side_nav" id="btq_trie_option">Prix décroissant</button>

                                <button  type="submit" name="sort" value="recent" class="side_nav" id="btq_trie_option">Plus récents</button>
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
                            <i class="fa-regular fa-heart"></i> 
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
        </div>
        </div>

        <div class="pagination-container">
            {{ $produits->links() }}
        </div>
    </section>

    <x-footer/>

@endsection
