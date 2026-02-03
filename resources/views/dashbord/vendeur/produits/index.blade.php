@extends('layouts.app')

@section('title', 'liste des produits')

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

        <div class="section_dash" id="patie">
            <section id="head_search">

                <div class="produit_search">
                    <input type="search" placeholder="Rechercher un produit" class="produit_search_input">
                    <a href="{{ route('dashbord.vendeur.produits.ajouter') }}" class="btn-add" id="btn_ajout">
                        <i class="fa fa-plus"></i>
                        Ajouter
                    </a>
                </div>

                <div class="product-filters">
                    <a href="{{ route('dashbord.vendeur.produits.index') }}" class="btn-filter {{ !request('filter') ? 'active' : '' }}">Tous les produits</a>
                    <a href="{{ route('dashbord.vendeur.produits.index', ['filter' => 'active']) }}" class="btn-filter {{ request('filter') === 'active' ? 'active' : '' }}">Actifs</a>
                    <a href="{{ route('dashbord.vendeur.produits.index', ['filter' => 'inactive']) }}" class="btn-filter {{ request('filter') === 'inactive' ? 'active' : '' }}">Inactifs</a>
                </div>

                <style>
                    .product-filters {
                        display: flex;
                        gap: 10px;
                        margin-bottom: 20px;
                    }
                    .btn-filter {
                        padding: 8px 15px;
                        background: #f4f4f4;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        text-decoration: none;
                        color: #333;
                        font-size: 14px;
                        transition: all 0.3s;
                    }
                    .btn-filter.active {
                        background: #B45309;
                        color: white;
                        border-color: #B45309;
                    }
                    .badge {
                        padding: 4px 8px;
                        border-radius: 4px;
                        font-size: 11px;
                        font-weight: bold;
                        text-transform: uppercase;
                    }
                    .badge-success { background: #d4edda; color: #155724; }
                    .badge-danger { background: #f8d7da; color: #721c24; }
                </style>
            </section>

            <section class="produits_liste">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div>
                    <table class="table_dash" id='tble_btn'> 
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Prix du produit</th>
                                <th>Qte. Min</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produits as $produit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->categorie->nom ?? 'N/A' }}</td>
                                    <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                                    <td>{{ $produit->qte_min }}</td>
                                    <td>
                                        @if($produit->is_active)
                                            <span class="badge badge-success">Actif</span>
                                        @else
                                            <span class="badge badge-danger">Inactif</span>
                                        @endif
                                    </td>
                                    
                                    <td class="table_action">
                                        <a href="{{ route('dashbord.vendeur.produits.edit', $produit) }}" 
                                                class="btn btn-primary" 
                                                style="background: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('dashbord.vendeur.produits.toggle-status', $produit) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn {{ $produit->is_active ? 'btn-warning' : 'btn-success' }}" 
                                                    title="{{ $produit->is_active ? 'Désactiver' : 'Activer' }}"
                                                    style="padding: 5px 10px; border-radius: 5px;">
                                                <i class="fa-solid {{ $produit->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('dashbord.vendeur.produits.destroy', $produit) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit dans votre liste?');">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i> 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                <td colspan="7" style="text-align:center;">Aucun produit trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $produits->links() }}
                </div>
            </section>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.produit_search_input');
            const tableBody = document.querySelector('.table_dash tbody');

            if (searchInput && tableBody) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const rows = tableBody.querySelectorAll('tr');

                    if (searchTerm.length < 2) {
                        rows.forEach(row => row.style.display = '');
                        return;
                    }

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
@endsection
