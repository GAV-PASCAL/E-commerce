@extends('layouts.app')

@section('title', 'Politique de Confidentialité')

@section('header')
    <section>
        <div class="accueil_info">
            <x-header />

            <div class="exp_dim" id="info">
                <h3 class="titre_page">Politique de Confidentialité</h3>
                <div class="breadcrumb">
                    <a href="{{ url('/') }}">Accueil</a> 
                    <i class="fa-solid fa-chevron-right"></i> 
                    <span>Politique de Confidentialité</span>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
<section class="privacy-policy-view" style="padding: 60px 0; background-color: #fdfdfd;">
    <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
        <div class="policy-card" style="background: white; padding: 40px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);">
            <h2 style="color: var(--primary-color); margin-bottom: 25px;">1. Collecte des données</h2>
            <p style="color: #4b5563; line-height: 1.8; margin-bottom: 30px;">
                Nous collectons les informations que vous nous fournissez directement lors de la création de votre compte, telles que votre nom, prénom, adresse e-mail et mot de passe. Ces données sont nécessaires pour vous fournir nos services de mise en relation commerciale.
            </p>

            <h2 style="color: var(--primary-color); margin-bottom: 25px;">2. Utilisation des données</h2>
            <p style="color: #4b5563; line-height: 1.8; margin-bottom: 30px;">
                Vos données sont utilisées pour :
                <ul style="margin-left: 20px; margin-bottom: 20px;">
                    <li>Gérer votre compte utilisateur.</li>
                    <li>Faciliter la communication entre acheteurs et vendeurs.</li>
                    <li>Améliorer nos services et votre expérience utilisateur.</li>
                    <li>Assurer la sécurité de notre plateforme.</li>
                </ul>
            </p>

            <h2 style="color: var(--primary-color); margin-bottom: 25px;">3. Protection des données</h2>
            <p style="color: #4b5563; line-height: 1.8; margin-bottom: 30px;">
                Nous mettons en œuvre des mesures de sécurité rigoureuses pour protéger vos informations personnelles contre tout accès, altération, divulgation ou destruction non autorisée. Vos mots de passe sont hashés de manière sécurisée.
            </p>

            <h2 style="color: var(--primary-color); margin-bottom: 25px;">4. Partage des données</h2>
            <p style="color: #4b5563; line-height: 1.8; margin-bottom: 30px;">
                Nous ne vendons ni ne louons vos données personnelles à des tiers. Vos informations ne sont partagées qu'avec les autres utilisateurs (vendeurs ou acheteurs) dans la mesure nécessaire à la conclusion de vos transactions.
            </p>

            <h2 style="color: var(--primary-color); margin-bottom: 25px;">5. Vos droits</h2>
            <p style="color: #4b5563; line-height: 1.8; margin-bottom: 30px;">
                Conformément à la réglementation en vigueur, vous disposez d'un droit d'accès, de rectification et de suppression de vos données personnelles. Vous pouvez exercer ces droits depuis votre tableau de bord ou en nous contactant.
            </p>

            <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid #eee; text-align: center;">
                <p style="color: #999; font-size: 0.9rem;">Dernière mise à jour : {{ date('d/m/Y') }}</p>
                <a href="{{ route('register') }}" class="button_connection" style="display: inline-block; margin-top: 20px; text-decoration: none;">Retour à l'inscription</a>
            </div>
        </div>
    </div>
</section>
@endsection
