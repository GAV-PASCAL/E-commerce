<header style="flex-basis: 25%;">
    <div class="sidebar">
        <div class="profile">
                    <!-- <img src="../logo.png" alt="" class="profile_img"> -->
            <h2 class="profile_indice">
                <?php echo e(strtoupper(mb_substr(Auth::user()->nom, 0, 1))); ?><?php echo e(strtoupper(mb_substr(Auth::user()->prenom, 0, 1))); ?>

            </h2>
                </div>
                <div class="side_navigation">
                    <nav id="sidebar_navigation">
                        <a href=" <?php echo e(route('dashbord.client.information')); ?> " class="nav_link <?php echo e(request()->routeIs('dashbord.client.information') ? 'active' : ''); ?>" id="option_navigation">Informations Personnelles</a>

                        <a href="<?php echo e(route('favoris.index')); ?>" class="nav_link <?php echo e(request()->routeIs('favoris.index') ? 'active' : ''); ?>" id="option_navigation">Favoris</a>

                        <a href="<?php echo e(route('client.commandes')); ?>" class="nav_link <?php echo e(request()->routeIs('client.commandes') ? 'active' : ''); ?>" id="option_navigation">Commandes</a> 

                        <a href=" <?php echo e(route('conversations.index')); ?> " class="nav_link <?php echo e(request()->routeIs('conversations.index') ? 'active' : ''); ?>" id="option_navigation">Messagerie</a>

                    </nav>

                    <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" id="btn_deconnexion" >Se déconnecter</button>
                    </form>
                </div>
            </div>
        </header><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/components/client.blade.php ENDPATH**/ ?>