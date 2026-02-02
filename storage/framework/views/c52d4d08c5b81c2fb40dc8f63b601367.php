<?php $__env->startSection('title', $produit->nom); ?>

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
                <h3 class="titre_page">Détails du Produit</h3>
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>">Accueil</a> 
                    <i class="fa-solid fa-chevron-right"></i> 
                    <a href="<?php echo e(route('produits.liste')); ?>">Boutique</a>
                    <i class="fa-solid fa-chevron-right"></i> 
                    <span><?php echo e($produit->nom); ?></span>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="product-detail-view">
        <div class="container">
            <div class="product-main-grid">
                <!-- Image Side -->
                <div class="product-gallery">
                    <div class="main-image-wrapper tilt-element" onclick="openLightbox()">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produit->image): ?>
                            <img src="<?php echo e(asset('storage/' . $produit->image)); ?>" alt="<?php echo e($produit->nom); ?>" class="product-featured-image" id="target-img">
                        <?php elseif($produit->urlimg): ?>
                            <img src="<?php echo e($produit->urlimg->url); ?>" alt="<?php echo e($produit->nom); ?>" class="product-featured-image" id="target-img">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/600" alt="<?php echo e($produit->nom); ?>" class="product-featured-image" id="target-img">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <div class="click-to-zoom">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                            <span>Cliquez pour agrandir</span>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                            <button class="fav-action-btn favorite-icon" data-produit-id="<?php echo e($produit->id); ?>" onclick="event.stopPropagation();">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        <?php else: ?>
                            <button class="fav-action-btn" onclick="event.stopPropagation(); window.location.href='<?php echo e(route('login')); ?>'">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <!-- Info Side -->
                <div class="product-essential-info">
                    <div class="product-badge"><?php echo e($produit->categorie->nom ?? 'Produit'); ?></div>
                    <h1 class="product-title"><?php echo e($produit->nom); ?></h1>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <span class="reviews-count">(4.8/5 - 24 avis)</span>
                    </div>

                    <div class="price-box">
                        <span class="current-price"><?php echo e(number_format($produit->prix, 0, ',', ' ')); ?> FCFA</span>
                        <div class="stock-info">
                            <i class="fa-solid fa-circle-check"></i> En stock
                        </div>
                    </div>

                    <div class="order-constraints">
                        <div class="constraint-item">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <span>Quantité minimale : <strong><?php echo e($produit->qte_min); ?> unités</strong></span>
                        </div>
                    </div>

                    <div class="product-actions">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                            <button class="main-cta-btn" onclick="window.location.href='<?php echo e(route('conversations.start', $produit)); ?>'">
                                <i class="fa-solid fa-comments"></i> Discuter avec le vendeur
                            </button>
                        <?php else: ?>
                            <button class="main-cta-btn secondary" onclick="window.location.href='<?php echo e(route('login')); ?>'">
                                <i class="fa-solid fa-right-to-bracket"></i> Connectez-vous pour discuter
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="trust-signals">
                        <div class="signal">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Paiement Sécurisé</span>
                        </div>
                        <div class="signal">
                            <i class="fa-solid fa-truck-fast"></i>
                            <span>Livraison Express</span>
                        </div>
                        <div class="signal">
                            <i class="fa-solid fa-award"></i>
                            <span>Qualité Vérifiée</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Block -->
            <div class="product-details-extra">
                <div class="details-tabs">
                    <button class="tab-btn active">Description</button>
                </div>
                <div class="tab-content">
                    <p><?php echo e($produit->description); ?></p>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produitsRelated->count() > 0): ?>
            <div class="related-section">
                <h2 class="section-title">Produits similaires</h2>
                <div class="btq_content">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $produitsRelated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="section_produit_details">
                            <a href="<?php echo e(route('produit.show', $related)); ?>" style="text-decoration: none; color: inherit;">
                                <div class="btq_section_image">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $related->image)); ?>" alt="<?php echo e($related->nom); ?>" class="produit_image">
                                    <?php elseif($related->urlimg): ?>
                                        <img src="<?php echo e($related->urlimg->url); ?>" alt="<?php echo e($related->nom); ?>" class="produit_image">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/300" alt="<?php echo e($related->nom); ?>" class="produit_image">
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                        <i class="fa-regular fa-heart favorite-icon" data-produit-id="<?php echo e($related->id); ?>" style="cursor: pointer;"></i>
                                    <?php else: ?>
                                        <i class="fa-regular fa-heart" style="cursor: pointer;" onclick="window.location.href='<?php echo e(route('login')); ?>'"></i>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 
                                </div>
                                <div class="image_info">
                                    <div>
                                        <h4><?php echo e($related->nom); ?></h4>
                                    </div>
                                    <div>
                                        <p><small>Quantité min: <b><?php echo e($related->qte_min); ?></b> unités</small></p>
                                    </div>
                                    <div class="prix_produit">
                                        <div class="etoiles">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <div>
                                            <h6 class="prix_fixe" ><?php echo e(number_format($related->prix, 0, ',', ' ')); ?> FCFA</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="btn_section">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                    <button type="button" class="btn_discussion" onclick="window.location.href='<?php echo e(route('conversations.start', $related)); ?>'">Discuter</button>
                                <?php else: ?>
                                    <button type="button" class="btn_discussion" onclick="window.location.href='<?php echo e(route('login')); ?>'">Discuter</button>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='<?php echo e(route('produit.show', $related)); ?>'">Voir détails</button>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="productLightbox" class="lightbox-modal" onclick="closeLightbox()">
        <span class="close-lightbox">&times;</span>
        <div class="lightbox-content-wrapper" onclick="event.stopPropagation()">
            <img class="lightbox-content" id="imgLightbox">
            <div id="caption"></div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if(auth()->guard()->check()): ?>
        loadFavorites();
        <?php endif; ?>

        document.querySelectorAll('.favorite-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                const produitId = this.dataset.produitId;
                toggleFavorite(produitId, this);
            });
        });

        // Effect 3D Tilt
        const tiltEffect = document.querySelector('.tilt-element');
        if(tiltEffect) {
            tiltEffect.addEventListener('mousemove', (e) => {
                const { width, height, left, top } = tiltEffect.getBoundingClientRect();
                const x = e.clientX - left;
                const y = e.clientY - top;
                const xc = width / 2;
                const yc = height / 2;
                const dx = x - xc;
                const dy = y - yc;
                
                tiltEffect.style.transform = `perspective(1000px) rotateY(${dx / 15}deg) rotateX(${-dy / 15}deg) scale3d(1.02, 1.02, 1.02)`;
            });

            tiltEffect.addEventListener('mouseleave', () => {
                tiltEffect.style.transform = `perspective(1000px) rotateY(0deg) rotateX(0deg) scale3d(1, 1, 1)`;
            });
        }
    });

    function openLightbox() {
        const modal = document.getElementById("productLightbox");
        const img = document.getElementById("target-img");
        const modalImg = document.getElementById("imgLightbox");
        const captionText = document.getElementById("caption");
        
        modal.style.display = "flex";
        setTimeout(() => modal.classList.add('active'), 10);
        modalImg.src = img.src;
        captionText.innerHTML = "<?php echo e($produit->nom); ?>";
        document.body.style.overflow = 'hidden'; // Prevent scroll
    }

    function closeLightbox() {
        const modal = document.getElementById("productLightbox");
        modal.classList.remove('active');
        setTimeout(() => modal.style.display = "none", 300);
        document.body.style.overflow = 'auto';
    }

    function loadFavorites() {
        fetch('<?php echo e(route("favoris.ids")); ?>')
            .then(response => response.json())
            .then(data => {
                const favoriteIds = data.favorite_ids;
                document.querySelectorAll('.favorite-icon').forEach(icon => {
                    const produitId = parseInt(icon.dataset.produitId);
                    if (favoriteIds.includes(produitId)) {
                        const i = icon.querySelector('i');
                        i.classList.remove('fa-regular');
                        i.classList.add('fa-solid', 'active');
                        icon.classList.add('is-active');
                    }
                });
            });
    }

    function toggleFavorite(produitId, iconElement) {
        fetch('<?php echo e(route("favoris.toggle")); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({ produit_id: produitId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const i = iconElement.querySelector('i');
                if (data.action === 'added') {
                    i.classList.remove('fa-regular');
                    i.classList.add('fa-solid', 'active');
                    iconElement.classList.add('is-active');
                } else {
                    i.classList.remove('fa-solid', 'active');
                    i.classList.add('fa-regular');
                    iconElement.classList.remove('is-active');
                }
            }
        });
    }
    </script>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/produit-detail.blade.php ENDPATH**/ ?>