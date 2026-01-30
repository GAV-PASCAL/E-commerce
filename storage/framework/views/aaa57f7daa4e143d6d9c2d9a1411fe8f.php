<?php $__env->startSection('title', 'Comment ça marche'); ?>

<?php $__env->startSection('header'); ?>

    <section>
        <div class="accueil_info">
            <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>

            <div class="exp_dim" id="info">
                <h3 class="titre_page">Comment ça marche</h3>

                <p>Découvrez comment Commander simplifiez vos achats en ligne en quelques étapes simples</p>
            </div>
        </div>
        
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="exp reveal" id="exp_sup">
        <div class="exp_content box_affiche reveal-delay-1">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">1</h2>
                    <h1 style="padding: 10px;">Créez votre compte</h1>
                </div>

                <p>
                    Inscrivez-vous gratuitement en quelques 
                    secondes. Remplissez vos informations de base 
                    et commencez à explorer notre plateforme. 
                    Aucune carte bancaire n'est requise pour l'inscription.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Inscription rapide et sécurisée</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Profil personnalisable </p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Accès immédiat à toutes les fonctionnalités</p>
                </div>
            </div>
        </div>

        <div class="reveal-delay-2">
            <img src=" <?php echo e(asset('assets/img/connexion.png')); ?> " alt="" class="exp_img">
        </div>
    </div>


    <div class="exp" id="exp_sup">
        <div class="reveal-left">
            <img src="<?php echo e(asset('assets/img/parcours.png')); ?>" alt="" class="exp_img">
        </div>

         <div class="exp_content box_affiche reveal-right">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">2</h2>
                    <h1 style="padding: 10px;">Parcourez les produits</h1>
                </div>

                <p>
                    Explorez notre vaste catalogue 
                    de produits provenant de boutiques du 
                    monde entier. Utilisez nos filtres avancés 
                    pour trouver exactement ce que vous cherchez.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Milliers de produits disponibles</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Filtres par catégorie, prix et boutique</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Recherche intelligente et rapide</p>
                </div>
            </div>
        </div>
    </div>


    <div class="exp" id="exp_sup">
        <div class="exp_content box_affiche reveal-left">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">3</h2>
                    <h1 style="padding: 10px;">Contactez le vendeur</h1>
                </div>

                <p>
                    Communiquez directement with les 
                    vendeurs via notre système de messagerie 
                    intégré. Posez vos questions, négociez les prix 
                    et finalisez les détails de votre commande.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Messagerie instantanée sécurisée</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Historique des conversations</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Notifications en temps réel</p>
                </div>
            </div>
        </div>

        <div class="reveal-right">
            <img src=" <?php echo e(asset('assets/img/connexion.png')); ?> " alt="" class="exp_img">
        </div>
    </div>

    <div class="exp" id="exp_sup">
        <div class="reveal-left">
            <img src=" <?php echo e(asset('assets/img/commder.png')); ?> " alt="" class="exp_img">
        </div>

        <div class="exp_content box_affiche reveal-right">
            <div class="exp_dim">
                <div class="exp">
                    <h2 class="exp_option">4</h2>
                    <h1 style="padding: 10px;">Passez commande</h1>
                </div>

                <p>
                    Une fois tous les détails 
                    confirmés, passez votre commande en 
                    toute sécurité. Suivez votre colis en 
                    temps réel jusqu'à la livraison.
                </p>
            </div>
            <div>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Paiement 100% sécurisé</p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Suivi de commande en temps réel </p>
                </div><br>
                <div class="exp">
                    <i class="fa-solid fa-check"></i>
                    <p>Garantie de satisfaction</p>
                </div>
            </div>
        </div>
    </div>


    <?php if (isset($component)) { $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $attributes; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Footer::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $attributes = $__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $component = $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>

    <script>
    function reveal() {
        let reveals = document.querySelectorAll(".reveal, .reveal-left, .reveal-right");
        for (let i = 0; i < reveals.length; i++) {
            let windowHeight = window.innerHeight;
            let elementTop = reveals[i].getBoundingClientRect().top;
            let elementVisible = 150;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
    reveal();
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/marche.blade.php ENDPATH**/ ?>