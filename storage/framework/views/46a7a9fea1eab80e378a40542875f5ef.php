<div id="tete_navigation">
    <header class="tete">
        <div>
            <img src=" <?php echo e(asset('assets/img/logo.png')); ?> " alt="Logo du site" width="100px" height="50px">
        </div>
        
        <!-- Desktop Navigation -->
        <div class="desktop_menu">
            <nav>
                <ul class="navigation">
                    <div><li><a href="<?php echo e(url('/')); ?>" id="option_navigation">Accueil</a></li></div>
                    <div><li><a href="<?php echo e(url('/savoir')); ?>" id="option_navigation">Comment ça marche</a></li></div>
                    <div><li><a href="<?php echo e(url('/boutique')); ?>" id="option_navigation">Produits</a></li></div>
                </ul>
            </nav>
        </div>

        <!-- Desktop Auth Buttons -->
        <div class="desktop_menu">
            <nav class="navigation">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>">
                        <button class="button_connection">Se connecter</button>
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role && auth()->user()->role->name === 'admin'): ?>
                        <a href="<?php echo e(route('dashbord.vendeur.information')); ?>" class="btn_rapide_change" id="option_navigation">Dashboard vendeur</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('dashbord.client.information')); ?>" class="btn_rapide_change" id="option_navigation">Dashboard client</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="button_connection">Se déconnecter</button>
                    </form>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </nav>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="menu_toggle">
            <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
        </div>
    </header>
</div>

<!-- Mobile Menu Overlay -->
<div id="mobile_menu_overlay" class="mobile_menu_overlay">
    <div class="mobile_menu_header">
        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Logo" width="80px">
        <i class="fa-solid fa-xmark close_menu_btn" onclick="toggleMenu()"></i>
    </div>
    <ul class="mobile_menu_links">
        <li><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
        <li><a href="<?php echo e(url('/savoir')); ?>">Comment ça marche</a></li>
        <li><a href="<?php echo e(url('/boutique')); ?>">Produits</a></li>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(route('login')); ?>" class="mobile_btn_login">Se connecter</a></li>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role && auth()->user()->role->name === 'admin'): ?>
                <li><a href="<?php echo e(route('dashbord.vendeur.information')); ?>">Dashboard vendeur</a></li>
            <?php else: ?>
                <li><a href="<?php echo e(route('dashbord.client.information')); ?>">Dashboard client</a></li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="mobile_btn_logout">Se déconnecter</button>
                </form>
            </li>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</div>

<script>
    function toggleMenu() {
        const overlay = document.getElementById('mobile_menu_overlay');
        overlay.classList.toggle('active');
        
        // Prevent body scrolling when menu is open
        if (overlay.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    }
</script><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/components/header.blade.php ENDPATH**/ ?>