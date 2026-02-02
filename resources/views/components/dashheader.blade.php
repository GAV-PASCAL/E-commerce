<header>
            <div class="sidebar">
                <div class="profile">
                    <!-- <img src="../logo.png" alt="" class="profile_img"> -->
                    <h2 class="profile_indice">
                        {{ strtoupper(mb_substr(Auth::user()->nom, 0, 1)) }}{{ strtoupper(mb_substr(Auth::user()->prenom, 0, 1)) }}
                    </h2>
                </div>
                <div class="side_navigation">
                    <nav id="sidebar_navigation">
                        <a href=" {{ route('dashbord.vendeur.information') }} " class="nav_link {{ request()->routeIs('dashbord.vendeur.information') ? 'active' : '' }}"  id="option_navigation">Informations Personnelles</a>

                        <a href=" {{ route('dashbord.vendeur.categories.index') }}" class="nav_link {{ request()->routeIs('dashbord.vendeur.categories.index') ? 'active' : '' }}" id="option_navigation">Crée des catégories</a>

                        <a href=" {{ route('dashbord.vendeur.produits.ajouter') }}" class="nav_link {{ request()->routeIs('dashbord.vendeur.produits.ajouter') ? 'active' : '' }}" id="option_navigation">Crée un produit</a>

                        <a href=" {{ route('dashbord.vendeur.produits.index') }} " class="nav_link {{ request()->routeIs('dashbord.vendeur.produits.index') ? 'active' : '' }}" id="option_navigation">Liste des produits</a>

                        <a href=" {{ route('dashbord.vendeur.messages.index') }} " class="nav_link {{ request()->routeIs('dashbord.vendeur.messages.index') ? 'active' : '' }}" id="option_navigation" style="position: relative;">
                            Messagerie
                            @livewire('message-notification-indicator')
                        </a>

                        <a href=" {{ route('commandes.index') }} " class="nav_link {{ request()->routeIs('commandes.index') ? 'active' : '' }}" id="option_navigation">Fiches de commande</a>

                        <a href="" id="option_navigation">Historiques</a>

                    </nav>

                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" id="btn_deconnexion" >Se déconnecter</button>
                    </form>
                </div>
            </div>
        </header>