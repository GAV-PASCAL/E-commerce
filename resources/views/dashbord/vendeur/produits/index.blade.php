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
            </section>

            <section class="produits_liste">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div>
                    <table class="table_dash"> 
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Prix du produit</th>
                                <th>Qte. Min</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produits as $produit)
                                <tr>
                                    <td>{{ $produit->id }}</td>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->categorie->nom ?? 'N/A' }}</td>
                                    <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                                    <td>{{ $produit->qte_min }}</td>
                                    
                                    <td class="table_action">
                                        <a href="{{ route('dashbord.vendeur.produits.edit', $produit) }}" 
                                                class="btn btn-primary" 
                                                style="background: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        
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
                                    <td colspan="6" style="text-align:center;">Aucun produit trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
