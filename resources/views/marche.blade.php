@extends('layouts.app')

@section('title', 'Comment ça marche')

@section('header')

    <section>
        <div class="accueil_info">
            <x-header />

            <div class="exp_dim" id="info">
                <h3 class="titre_page">Comment ça marche</h3>

                <p>Découvrez comment Commander simplifiez vos achats en ligne en quelques étapes simples</p>
            </div>
        </div>
        
    </section>

@endsection('header')

@section('content')

<div class="exp" id="exp_sup">
        <div class="exp_content">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">1</h2>
                    <h1 style="padding: 10px;">Créez votre compte</h1>
                </div>

                <p>
                    Inscrivez-vous gratuitement en quelques 
                    secondes. Remplissez vos informations de base 
                    et commencez à explorer notre plateforme. 
                    Aucune carte bancaire n\'est requise pour l\'inscription.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Inscription rapide et sécurisée</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Profil personnalisable </p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Accès immédiat à toutes les fonctionnalités</p>
                </div>
            </div>
        </div>

        <div>
            <img src=" {{asset('assets/img/connexion.png')}} " alt="" class="exp_img">
        </div>
    </div>


    <div class="exp" id="exp_sup">
        <div>
            <img src="{{ asset('assets/img/parcours.png')}}" alt="" class="exp_img">
        </div>

         <div class="exp_content">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">2</h2>
                    <h1 style="padding: 10px;">Parcourez les produits</h1>
                </div>

                <p>
                    Explorez notre vaste catalogue 
                    de produits provenant de boutiques du 
                    monde entier. Utilisez nos filtres avancés 
                    pour trouver exactement ce que vous cherchez.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Milliers de produits disponibles</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Filtres par catégorie, prix et boutique</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Recherche intelligente et rapide/p>
                </div>
            </div>
        </div>
    </div>


    <div class="exp" id="exp_sup">
        <div class="exp_content">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">3</h2>
                    <h1 style="padding: 10px;">Contactez le vendeur</h1>
                </div>

                <p>
                    Communiquez directement avec les 
                    vendeurs via notre système de messagerie 
                    intégré. Posez vos questions, négociez les prix 
                    et finalisez les détails de votre commande.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Messagerie instantanée sécurisée</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Historique des conversations</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Notifications en temps réel</p>
                </div>
            </div>
        </div>

        <div>
            <img src=" {{asset('assets/img/connexion.png')}} " alt="" class="exp_img">
        </div>
    </div>

    <div class="exp" id="exp_sup">
        <div>
            <img src=" {{asset('assets/img/commder.png')}} " alt="" class="exp_img">
        </div>

         <div class="exp_content">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">4</h2>
                    <h1 style="padding: 10px;">Passez commande</h1>
                </div>

                <p>
                    Une fois tous les détails 
                    confirmés, passez votre commande en 
                    toute sécurité. Suivez votre colis en 
                    temps réel jusqu'à la livraison.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Paiement 100% sécurisé</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Suivi de commande en temps réel </p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Garantie de satisfaction</p>
                </div>
            </div>
        </div>
    </div>


    <x-footer/>

@endsection('content')