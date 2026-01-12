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
                <h3 class="titre_page"><?php echo e($produit->nom); ?></h3>
                <p><?php echo e($produit->categorie->nom ?? 'Produit'); ?></p>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <div class="produit-detail-container">
            <div class="produit-images">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produit->image): ?>
                    <img src="<?php echo e(asset('storage/' . $produit->image)); ?>" alt="<?php echo e($produit->nom); ?>" class="main-image" width="300px" height="300px">
                <?php elseif($produit->urlimg): ?>
                    <img src="<?php echo e($produit->urlimg->url); ?>" alt="<?php echo e($produit->nom); ?>" class="main-image">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <i class="fa-regular fa-heart"></i>
                
                <!-- <div class="thumbnails">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produit->image): ?>
                        <img src="<?php echo e(asset('storage/' . $produit->image)); ?>" alt="<?php echo e($produit->nom); ?>" class="thumb active">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div> -->
            </div>

            <div class="produit-info">
                <h2> Nom : <?php echo e($produit->nom); ?></h2>
                <h4 class="categorie">Catégorie: <?php echo e($produit->categorie->nom ?? 'N/A'); ?></h4>
                
                <div class="prix-section">
                    <h2><?php echo e(number_format($produit->prix, 0, ',', ' ')); ?> FCFA</h2>
                    <h5>Quantité minimale: <?php echo e($produit->qte_min); ?> unités</h5>
                </div>

                <div class="description">
                    <h3>Description</h3>
                    <h5><?php echo e($produit->description); ?></h5>
                </div>

                <div class="actions">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <button class="btn_discussion" onclick="window.location.href='<?php echo e(route('conversations.start', $produit->id)); ?>'">Discuter avec le vendeur</button>
                    <?php else: ?>
                        <button class="btn btn-primary" onclick="window.location.href='<?php echo e(route('login')); ?>'">Connectez-vous pour discuter</button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produitsRelated->count() > 0): ?>
        <div class="related-products" style="margin: 20px">
            <h3>Produits similaires</h3>
            <div class="btq_content">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $produitsRelated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="section_produit_details">
                        <a href="<?php echo e(route('produit.show', $related->id)); ?>" style="text-decoration: none; color: inherit;">
                            <div class="btq_section_image">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $related->image)); ?>" alt="<?php echo e($related->nom); ?>" class="produit_image">
                                <?php elseif($related->urlimg): ?>
                                    <img src="<?php echo e($related->urlimg->url); ?>" alt="<?php echo e($related->nom); ?>" class="produit_image">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/300" alt="<?php echo e($related->nom); ?>" class="produit_image">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="image_info">
                                <div>
                                    <h4><?php echo e($related->nom); ?></h4>
                                </div>
                                <div class="prix_produit">
                                    <h5 class="prix_fixe" ><?php echo e(number_format($related->prix, 0, ',', ' ')); ?> FCFA</h5>
                                </div>
                                <div>
                                    <div class="etoiles">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="btn_section">
                            <button type="button" class="btn_discussion" onclick="window.location.href='<?php echo e(route('conversations.start', $produit->id)); ?>'">Discuter</button>
                            <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='<?php echo e(route('produit.show', $produit->id)); ?>'">Voir détails</button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section><br><br>

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