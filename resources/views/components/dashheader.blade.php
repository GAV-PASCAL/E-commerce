<header style="flex-basis: 25%;">
            <div class="sidebar">
                <div class="profile">
                    <!-- <img src="../logo.png" alt="" class="profile_img"> -->
                    <h2 class="profile_indice">
                        V
                    </h2>
                </div>
                <div class="side_navigation">
                    <nav id="sidebar_navigation">
                        <a href=" {{ route('dashbord.vendeur.information') }} " class="nav_link {{ request()->is('dashbord/vendeur/information') ? 'active' : '' }}"  id="option_navigation">Informations Personnelles</a>

                        <a href=" {{ route('dashbord.vendeur.categories.index') }}" class="nav_link {{ request()->is('dashbord/vendeur/categories/index') ? 'active' : '' }}" id="option_navigation">Crée des catégories</a>

                        <a href=" {{ route('dashbord.vendeur.produits.ajouter') }}" class="nav_link {{ request()->is('dashbord/vendeur/produits/ajouter') ? 'active' : '' }}" id="option_navigation">Crée un produit</a>

                        <a href=" {{ route('dashbord.vendeur.produits.index') }} " class="nav_link {{ request()->is('dashbord/vendeur/produits/index') ? 'active' : '' }}" id="option_navigation">Liste des produits</a>

                        <a href=" {{ route('dashbord.vendeur.messages.index') }} " class="nav_link {{ request()->is('dashbord/vendeur/messages/index') ? 'active' : '' }}" id="option_navigation"> Messagerie</a>

                        <a href="" id="option_navigation">Fiche de commande</a>

                        <a href="" id="option_navigation">Historiques</a>

                    </nav>
                </div>
            </div>
        </header>