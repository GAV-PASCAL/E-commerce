@extends('layouts.app')

@section('title', 'Mes Commandes')

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
                    <a href="{{ route('commandes.create') }}" class="btn-fiche" id="btn_ajout">
                        <i class="fa fa-plus"></i>
                        fiche de commande
                    </a>
                </div>
            </section>

            <div class="produits_liste">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($commandes->isEmpty())
                    <div class="alert alert-info">
                        Aucune commande pour le moment. <a href="{{ route('commandes.create') }}">Créer une première commande</a>
                    </div>
                @else
                    <table class="table_dash">
                        <thead>
                            <tr>
                                <th>Numéro de Fiche</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Montant Total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($commandes as $commande)
                                <tr>
                                    <td><strong>{{ $commande->numero_fiche }}</strong></td>
                                    <td>{{ $commande->user->nom }} {{ $commande->user->prenom }}</td>
                                    <td>{{ $commande->date_commande->format('d/m/Y') }}</td>
                                    <td>{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</td>
                                    <td>
                                        @if($commande->statut === 'en_attente')
                                            <span class="badge badge-warning" style="background: #ffc107; color: #000; padding: 5px 10px; border-radius: 5px;">
                                                En attente
                                            </span>
                                        @elseif($commande->statut === 'validee')
                                            <span class="badge badge-success" style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                                Validée
                                            </span>
                                        @else
                                            <span class="badge badge-danger" style="background: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                                Annulée
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 10px;">
                                            <a href="{{ route('commandes.show', $commande) }}" 
                                               class="btn btn-info" 
                                               style="background: #17a2b8; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                               <i class="fa-solid fa-eye"></i>
                                            </a>
                                            @if($commande->statut === 'en_attente')
                                                <a href="{{ route('commandes.edit', $commande) }}" 
                                                class="btn btn-primary" 
                                                style="background: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            @endif
                                            <form action="{{ route('commandes.destroy', $commande) }}" 
                                                  method="POST" 
                                                  style="display: inline;"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger" 
                                                        >
                                                    <i class="fa-solid fa-trash"></i> 
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>            
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
