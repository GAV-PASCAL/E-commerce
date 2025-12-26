@extends('layouts.app')

@section('title', 'Mes Favoris')


@section('header')

    <div class="title_dash">
        <h1>DASHBOARD</h1>
    </div>

@endsection

@section('content')

    <div id="page_structure">
        <x-client/>

        <div class="section_dash">
            <x-dashnav/><br><br><br>

            <div class="back_formulaire">
                <h4 class="info_form">Mes Produits Favoris</h4>
            
            @if($favoris->count() > 0)
                <div class="btq_content">
                    @foreach($favoris as $favori)
                        @php
                            $produit = $favori->produit;
                        @endphp
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
                                    <i class="fa-solid fa-heart favorite-icon active" data-produit-id="{{ $produit->id }}" style="cursor: pointer;"></i>
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
                                            <h5 class="prix_fixe">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</h5>
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
            @else
                <div class="text-center" style="padding: 50px;">
                    <i class="fa-regular fa-heart" style="font-size: 64px; color: #ccc; margin-bottom: 20px;"></i>
                    <h3>Aucun produit favori</h3>
                    <p>Vous n'avez pas encore ajouté de produits à vos favoris.</p>
                    <a href="{{ route('produits.liste') }}" class="btn_discussion" style="margin-top: 20px; display: inline-block;">Découvrir les produits</a>
                </div>
            @endif
            </div>            
        </div>

    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
            if (data.action === 'removed') {
                // Retirer le produit de la page
                iconElement.closest('.section_produit_details').remove();
                
                // Vérifier s'il reste des produits
                if (document.querySelectorAll('.section_produit_details').length === 0) {
                    location.reload();
                }
            }
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
}
</script>

@endsection
