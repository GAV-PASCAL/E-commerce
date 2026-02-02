<div id="tete_navigation">
    <header class="tete">
        <div class="logo_container">
            <a href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Logo" width="100px">
            </a>
        </div>
        
        <!-- Desktop Navigation -->
        <div class="desktop_menu">
            <nav>
                <ul class="navigation">
                    <li><a href="<?php echo e(url('/')); ?>" id="option_navigation" class="<?php echo e(Request::is('/') ? 'active' : ''); ?>">Accueil</a></li>
                    <li><a href="<?php echo e(url('/savoir')); ?>" id="option_navigation" class="<?php echo e(Request::is('savoir') ? 'active' : ''); ?>">Comment ça marche</a></li>
                    <li><a href="<?php echo e(url('/produits')); ?>" id="option_navigation" class="<?php echo e(Request::is('produits') ? 'active' : ''); ?>">Produits</a></li>
                </ul>
            </nav>
        </div>

        <!-- Desktop Auth Buttons -->
        <div class="desktop_menu">
            <div class="auth_buttons">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>">
                        <button class="button_connection">Se connecter</button>
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role && auth()->user()->role->name === 'admin'): ?>
                        <a href="<?php echo e(route('dashbord.vendeur.information')); ?>" class="dash_link">Dashboard vendeur</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('dashbord.client.information')); ?>" class="dash_link">Dashboard client</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="button_connection" >Déconnexion</button>
                    </form>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
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
        <li><a href="<?php echo e(url('/produits')); ?>">Produits</a></li>
        
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
                        <button type="submit" class="dash_logout_btn">Se déconnecter</button>
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