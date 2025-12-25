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
                        <a href=" {{ route('dashbord.vendeur.information') }} "  id="option_navigation">Informations Personnelles</a>

                        <a href=" {{ route('dashbord.vendeur.categories.index') }}" id="option_navigation">Crée des catégories</a>

                        <a href=" {{ route('dashbord.vendeur.produits.ajouter') }}" id="option_navigation">Crée un produit</a>

                        <a href=" {{ route('dashbord.vendeur.produits.index') }} " id="option_navigation">Liste des produits</a>

                        <a href=" {{ route('dashbord.vendeur.messages.index') }} " id="option_navigation"> Messagerie</a>

                        <a href="" class="side_nav" id="a">Fiche de commande</a>

                        <a href="" class="side_nav" id="a">Historiques</a>

                    </nav>
                </div>
            </div>
        </header>