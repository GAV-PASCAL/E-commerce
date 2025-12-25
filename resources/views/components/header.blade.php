<div id="tete_navigation">
    <header class="tete">
        <div >
            <img src=" {{ asset('assets/img/logo.png') }} " alt="" width="100px" height="50px">
        </div>
                <div>
                    <nav>
                        <ul class="navigation">
                            <div><li><a href="{{ url('/') }}" id="option_navigation">Accueil</a></li></div>
                            <div><li><a href="{{ url('/savoir') }}" id="option_navigation">Comment ça marche</a></li></div>
                            <div><li><a href="{{ url('/boutique') }}" id="option_navigation">Produits</a></li></div>
                            <div><li><a href="#" id="option_navigation">message</a></li></div>
                        </ul>
                    </nav>
                </div>
                <div>
                    <nav class="navigation">
                        <div>
                            <div><li><a href="#" id="option_navigation">Historiques</a></li></div>
                        </div>

                        @guest
                            <a href="{{ route('login') }}">
                                <button class="button_connection">Se connecter</button>
                            </a>
                        @endguest

                        @auth
                            @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                                <a href="{{ route('dashbord.vendeur.information') }}" id="option_navigation">Dashboard vendeur</a>
                            @else
                                <a href="{{ route('dashbord.client.information') }}" id="option_navigation">Dashboard client</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="button_connection">Se déconnecter</button>
                            </form>
                        @endauth
                    </nav>
                </div>
            </header>
        </div>