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
                        <a href=" <?php echo e(route('dashbord.vendeur.information')); ?> " class="nav_link <?php echo e(request()->is('dashbord/vendeur/information') ? 'active' : ''); ?>"  id="option_navigation">Informations Personnelles</a>

                        <a href=" <?php echo e(route('dashbord.vendeur.categories.index')); ?>" class="nav_link <?php echo e(request()->is('dashbord/vendeur/categories/index') ? 'active' : ''); ?>" id="option_navigation">Crée des catégories</a>

                        <a href=" <?php echo e(route('dashbord.vendeur.produits.ajouter')); ?>" class="nav_link <?php echo e(request()->is('dashbord/vendeur/produits/ajouter') ? 'active' : ''); ?>" id="option_navigation">Crée un produit</a>

                        <a href=" <?php echo e(route('dashbord.vendeur.produits.index')); ?> " class="nav_link <?php echo e(request()->is('dashbord/vendeur/produits/index') ? 'active' : ''); ?>" id="option_navigation">Liste des produits</a>

                        <a href=" <?php echo e(route('dashbord.vendeur.messages.index')); ?> " class="nav_link <?php echo e(request()->is('dashbord/vendeur/messages/index') ? 'active' : ''); ?>" id="option_navigation"> Messagerie</a>

                        <a href="<?php echo e(route('dashbord.vendeur.commande.liste')); ?>" class="nav_link <?php echo e(request()->is('dashbord/vendeur/commande/liste') ? 'active' : ''); ?>" id="option_navigation">Fiches de commande</a>

                        <a href="" id="option_navigation">Historiques</a>

                    </nav>

                    <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" id="btn_deconnexion" >Se déconnecter</button>
                    </form>
                </div>
            </div>
        </header><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/components/dashheader.blade.php ENDPATH**/ ?>