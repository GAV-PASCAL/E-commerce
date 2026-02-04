<?php $__env->startSection('title'); ?>
    Accueil Easyorder
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="accueil">

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
        <div class="bienvenue"> 
            <div>
                <div class="accroche">
                    <h1 class="hero-title">
                        <span id="typing-text"></span><span class="cursor"></span>
                    </h1>

                    <p class="hero-subtitle">
                        EasyOrder vous connecte directement et explorer les produits pour négocier, commander et conclure vos achats simplement et rapidement.
                    </p>
                </div>
            </div>

            <div class="info_accueil">
                <div class="accueil_rapide">
                    <button class="btn_rapide" onclick="window.location.href='<?php echo e(route('produits.liste')); ?>'">Découvrez les produits</button>
                    <button class="btn_rapide_change" onclick="window.location.href='/savoir'">Comment ça marche</button>
                </div>
            </div>
        </div>
                                                                            
    </section>
        
    <section id="prq" class="reveal">
        <div class="fonction">
            <h1 class="reveal reveal-delay-1">Pourquoi Nous ?</h1>
            <p style="text-align: center;" class="reveal reveal-delay-2">
                Une plateforme complète qui réunit
                tous les acteurs du commerce en ligne pour 
                des transactions sécurisées et efficaces
            </p>
        </div>

        <div class="fonction_grid_globale">
            <div id="fonction_grid">
                <?php $delay = 1; ?>
                <div class="section_fonction reveal reveal-delay-<?php echo e($delay++); ?>">
                    <div class="fonction_details">
                        <i class="fa-solid fa-earth-africa"></i>

                        <h3>Boutique mondiale</h3>
                    </div>

                    <p class="fonction_description">
                        Accédez à des produits du monde entier et
                        vendez à une clientèle internationale sans 
                        frontières.
                    </p>
                </div>
                <!-- ... repeat for others or just add reveal classes manually ... -->
                <div class="section_fonction reveal reveal-delay-<?php echo e($delay++); ?>">
                    <div class="fonction_details">
                        <i class="fa-solid fa-tags"></i>

                        <h3>Boutique Abordable</h3>
                    </div>

                    <p class="fonction_description">
                        Tous nos grossistes sont vérifiés pour garantir la qualité et la fiabilité de vos achats.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-<?php echo e($delay++); ?>">
                    <div class="fonction_details">
                       <i class="fa-solid fa-shield-halved"></i>

                        <h3>Transactions sécurisée</h3>
                    </div>

                    <p class="fonction_description">
                        Système de paiement sécurisé et suivi complet de vos commandes pour une tranquillité totale.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-<?php echo e($delay++); ?>">
                    <div class="fonction_details">
                       <i class="fa-solid fa-comment-dots"></i>

                        <h3>Chat intégrer</h3>
                    </div>

                    <p class="fonction_description">
                        Discutez directement avec les vendeurs pour finaliser vos commandes et négocier les détails.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-<?php echo e($delay++); ?>">
                    <div class="fonction_details">
                        <i class="fa-solid fa-percent"></i>

                        <h3>Prix compétitifs</h3>
                    </div>

                    <p class="fonction_description">
                        Bénéficiez de tarifs grossistes avantageux et de promotions exclusives régulières.
                    </p>
                </div>
                <div class="section_fonction reveal reveal-delay-<?php echo e($delay++); ?>">
                    <div class="fonction_details">
                        <i class="fa-solid fa-truck"></i>

                        <h3>Livraison Rapide</h3>
                    </div>

                    <p class="fonction_description">
                        Suivi en temps réel de vos commandes avec des options de livraison flexibles et rapides.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="process_section reveal">
        <div class="fonction">
            <h1 class="reveal reveal-delay-1">Comment ça marche</h1>

            <P class="reveal reveal-delay-2">Un processus simple et efficace pour commander vos produits en toute tranquilité</P>
        </div>
        <div class="process">
            <?php $p_delay = 1; ?>
            <div class="process_details reveal reveal-delay-<?php echo e($p_delay++); ?>">
                <i class="fa-solid fa-circle-user"></i>
                <h6 class="numb">01</h6>
                <h3>Créer votre compte</h3>
                <br>
                <p>Inscrivez-vous gratuitement en quelques 
                    minutes et accédez à notre catalogue de produits 
                    mondiaux.
                </p>
            </div>
            <div class="process_details reveal reveal-delay-<?php echo e($p_delay++); ?>">
                <i class="fa-solid fa-store"></i>
                <h6 class="numb">02</h6>
                <h3>Explorez les produits</h3>
                <br>
                <p>
                    Parcourez notre large sélection de produits par catégorie, prix ou boutique selon vos besoins.
                </p>
            </div>
            <div class="process_details reveal reveal-delay-<?php echo e($p_delay++); ?>">
                <i class="fa-solid fa-comments"></i>
                <h6 class="numb">03</h6>
                <h3>Discussion avec vendeur</h3>
                <br>
                <p>
                    Communiquez directement avec les grossistes pour négocier les détails de votre commande.
                </p>
            </div>
            <div class="process_details reveal reveal-delay-<?php echo e($p_delay++); ?>">
                <i class="fa-solid fa-cart-shopping"></i>
                <h6 class="numb">04</h6>
                <h3>Passez commande</h3>
                <br>
                <p>
                    Finalisez votre achat en toute sécurité avec notre système de paiement protégé et suivez votre livraison.
                </p>
            </div>
        </div>

        <button class="btn_process reveal reveal-delay-1" onclick="window.location.href='/savoir'">
            En Savoir Plus
        </button>
    </section>

    <section class="categorie_section reveal">
        <div>
            <h2 class="voir reveal reveal-delay-1">
                Les Différentes catégories
            </h2>
        </div><br><br>
        <div id="categoryCarouselContainer" class="category-carousel-container">
            <div class="category-carousel-track" id="categoryTrack">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="category-card">
                        <a href="<?php echo e(route('produits.liste', ['categorie_id' => $categorie->id])); ?>" class="categorie-link">
                            <img src=" <?php echo e(asset('storage/' . $categorie->image)); ?> " alt="" class="dim_image" > <br>
                            <h4 class="voir"><?php echo e($categorie->nom); ?></h4>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="produits reveal">
        <div>
            <h2 class="reveal reveal-delay-1">Les différentes Produits</h2>
        </div>

        <div class="btq_content" id="taille">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="section_produit_details">
                    <a href="<?php echo e(route('produit.show', $produit)); ?>" style="text-decoration: none; color: inherit;">
                        <div class="btq_section_image">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produit->image): ?>
                                <img src="<?php echo e(asset('storage/' . $produit->image)); ?>" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                            <?php elseif($produit->urlimg): ?>
                                <img src="<?php echo e($produit->urlimg->url); ?>" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                <i class="fa-regular fa-heart favorite-icon" data-produit-id="<?php echo e($produit->id); ?>" style="cursor: pointer;"></i>
                            <?php else: ?>
                                <i class="fa-regular fa-heart" style="cursor: pointer;" onclick="window.location.href='<?php echo e(route('login')); ?>'"></i>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 
                        </div>
                        <div class="image_info">
                            <div>
                                <h4><?php echo e($produit->nom); ?></h4>
                            </div>
                            <div>
                                <p><small>Quantité min: <?php echo e($produit->qte_min); ?> unités</small></p>
                            </div>
                            <div class="prix_produit">
                                <div class="etoiles">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div>
                                    <h5 class="prix_fixe" ><?php echo e(number_format($produit->prix, 0, ',', ' ')); ?> FCFA</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="btn_section">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                            <button type="button" class="btn_discussion" onclick="window.location.href='<?php echo e(route('conversations.start', $produit)); ?>'">Discuter</button>
                        <?php else: ?>
                            <button type="button" class="btn_discussion" onclick="window.location.href='<?php echo e(route('login')); ?>'">Discuter</button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='<?php echo e(route('produit.show', $produit)); ?>'">Voir détails</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center w-100">
                    <p>Aucun produit disponible pour le moment.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div><br><br>
    </section>

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
    document.addEventListener('DOMContentLoaded', function() {
        // Charger l'état des favoris au chargement de la page
        <?php if(auth()->guard()->check()): ?>
        loadFavorites();
        <?php endif; ?>

        // Gérer le clic sur les icônes de favoris
        document.querySelectorAll('.favorite-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const produitId = this.dataset.produitId;
                toggleFavorite(produitId, this);
            });
        });
    });

    function loadFavorites() {
        fetch('<?php echo e(route("favoris.ids")); ?>')
            .then(response => response.json())
            .then(data => {
                const favoriteIds = data.favorite_ids;
                
                document.querySelectorAll('.favorite-icon').forEach(icon => {
                    const produitId = parseInt(icon.dataset.produitId);
                    if (favoriteIds.includes(produitId)) {
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid', 'active');
                    }
                });
            })
            .catch(error => {
                console.error('Erreur lors du chargement des favoris:', error);
            });
    }

    function toggleFavorite(produitId, iconElement) {
        fetch('<?php echo e(route("favoris.toggle")); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({
                produit_id: produitId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.action === 'added') {
                    iconElement.classList.remove('fa-regular');
                    iconElement.classList.add('fa-solid', 'active');
                } else {
                    iconElement.classList.remove('fa-solid', 'active');
                    iconElement.classList.add('fa-regular');
                }
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }

    // Scroll Reveal Logic
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
    // Trigger once on load
    reveal();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/accueil.blade.php ENDPATH**/ ?>