<div id="tete_navigation">
    <header class="tete">
        <div >
            <img src=" <?php echo e(asset('assets/img/logo.png')); ?> " alt="" width="100px" height="50px">
        </div>
                <div>
                    <nav>
                        <ul class="navigation">
                            <div><li><a href="<?php echo e(url('/')); ?>" id="option_navigation">Accueil</a></li></div>
                            <div><li><a href="<?php echo e(url('/savoir')); ?>" id="option_navigation">Comment ça marche</a></li></div>
                            <div><li><a href="<?php echo e(url('/boutique')); ?>" id="option_navigation">Produits</a></li></div>
                        </ul>
                    </nav>
                </div>
                <div>
                    <nav class="navigation">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('login')); ?>">
                                <button class="button_connection">Se connecter</button>
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role && auth()->user()->role->name === 'admin'): ?>
                                <a href="<?php echo e(route('dashbord.vendeur.information')); ?>" id="option_navigation">Dashboard vendeur</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('dashbord.client.information')); ?>" id="option_navigation">Dashboard client</a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="button_connection">Se déconnecter</button>
                            </form>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </nav>
                </div>
            </header>
        </div><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/components/header.blade.php ENDPATH**/ ?>