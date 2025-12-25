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

        <div class="section_formulaire_two" >
            <form id="connexion" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div>
                    <label for="email">Email</label><br>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="formulaire_input" required autofocus>
                </div>

                <div>
                    <label for="password">Mot de passe</label><br>
                    <input id="password" type="password" name="password" class="formulaire_input"  required>
                </div>

                <div>
                    <label>
                        <input type="checkbox" name="remember"> Se souvenir de moi
                    </label>
                </div>

                <div>
                    <button type="submit" id="btn-formulaire">Se connecter</button>
                </div>

                <p>
                    Déjà un compte ? <a href="{{ route('register') }}">S'inscrire</a>
                </p>
            </form>
        </div>


        <div class="section_formulaire_one">
            <div>
                <h1>Connexion sur Easyorder</h1>
            </div>
            <div>
                <img src="{{ asset('assets/img/logo_o.png') }}" alt="" width="250px" height="250px">
            </div>
            <div>
                <p>
                    Bienvenue sur notre plateforme de commande en ligne. <br>
                    Connectez-vous et profitez de nos nouvelles offres et produits. <br>
                    Commande plus rapidement et surement 
                </p>
            </div>
        </div>
        
    </div>
</div>
@endsection
