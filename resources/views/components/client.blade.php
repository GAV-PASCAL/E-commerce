<header style="flex-basis: 25%;">
    <div class="sidebar">
        <div class="profile">
                    <!-- <img src="../logo.png" alt="" class="profile_img"> -->
            <h2 class="profile_indice">
                {{ strtoupper(mb_substr(Auth::user()->nom, 0, 1)) }}{{ strtoupper(mb_substr(Auth::user()->prenom, 0, 1)) }}
            </h2>
                </div>
                <div class="side_navigation">
                    <nav id="sidebar_navigation">
                        <a href=" {{ route('dashbord.client.information') }} " id="option_navigation">Informations Personnelles</a>

                        <a href="{{ route('favoris.index') }}" id="option_navigation">Favoris</a>

                        <a href="{{ route('client.commandes') }}" id="option_navigation">Commandes</a> 

                        <a href=" {{ route('conversations.index') }} " id="option_navigation">Messagerie</a>

                    </nav>

                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" id="btn_deconnexion" >Se déconnecter</button>
                    </form>
                </div>
            </div>
        </header>