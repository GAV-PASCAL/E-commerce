@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="register_div">

        <div class="section_formulaire_one">
            <div>
                <h1>Inscription sur Easyorder</h1>
            </div>
            <div>
                <img src="{{ asset('assets/img/logo_o.png') }}" alt="" width="250px" height="250px">
            </div>
            <div>
                <p>
                    Bienvenue sur notre plateforme de commande en ligne. <br>
                    Inscrivez-vous et profitez de nos offres et produits. <br>
                    Commande plus rapidement et surement 
                </p>
            </div>
        </div>

        <div class="section_formulaire_two">
            <form class="inscription" method="POST" action="{{ route('register.post') }}">
                @csrf   
                <div class="information">
                    <div>
                        <label for="nom">Nom</label><br>
                        <input 
                            id="nom" 
                            type="text" 
                            name="nom" 
                            value="{{ old('nom') }}" 
                            class="formulaire_input" 
                            pattern="[a-zA-ZÀ-ÿ\s\-']+"
                            title="Le nom ne peut contenir que des lettres, espaces, tirets et apostrophes"
                            maxlength="255"
                            required>
                    </div>

                    <div>
                        <label for="prenom">Prénom</label><br>
                        <input 
                            id="prenom" 
                            type="text" 
                            name="prenom" 
                            value="{{ old('prenom') }}" 
                            class="formulaire_input" 
                            pattern="[a-zA-ZÀ-ÿ\s\-']+"
                            title="Le prénom ne peut contenir que des lettres, espaces, tirets et apostrophes"
                            maxlength="255"
                            required>
                    </div>
                </div>

                <div>
                    <label for="email">Email</label><br>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="formulaire_input" 
                        maxlength="255"
                        required>
                </div>

                <div>
                    <label for="password">Mot de passe</label><br>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        class="formulaire_input" 
                        minlength="8"
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}"
                        title="Le mot de passe doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre"
                        required>
                    <small style="color: #666; font-size: 0.85em;">
                        Minimum 8 caractères avec au moins 1 minuscule, 1 majuscule et 1 chiffre
                    </small>
                </div>

                <div>
                    <label for="password_confirmation">Confirmer le mot de passe</label><br>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        class="formulaire_input" 
                        minlength="8"
                        required>
                </div>

                <div>
                    <button type="submit" id="btn-formulaire">S'inscrire</button>
                </div>

                <p>
                    Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
                </p>
                
            </form>
        </div>

        
    </div>
</div>
@endsection
