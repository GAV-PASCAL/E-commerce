

<?php $__env->startSection('title', 'Mes Favoris'); ?>


<?php $__env->startSection('header'); ?>

    <div class="title_dash">
        <h1>DASHBOARD</h1>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div id="page_structure">
        <?php if (isset($component)) { $__componentOriginal2ccf36a322409b76566b65fcab70ed9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d = $attributes; } ?>
<?php $component = App\View\Components\Client::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Client::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $attributes = $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $component = $__componentOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>

        <div class="section_dash">
            <?php if (isset($component)) { $__componentOriginal020f66f7c7b8c356eb995e6f46315839 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal020f66f7c7b8c356eb995e6f46315839 = $attributes; } ?>
<?php $component = App\View\Components\Dashnav::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashnav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Dashnav::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal020f66f7c7b8c356eb995e6f46315839)): ?>
<?php $attributes = $__attributesOriginal020f66f7c7b8c356eb995e6f46315839; ?>
<?php unset($__attributesOriginal020f66f7c7b8c356eb995e6f46315839); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal020f66f7c7b8c356eb995e6f46315839)): ?>
<?php $component = $__componentOriginal020f66f7c7b8c356eb995e6f46315839; ?>
<?php unset($__componentOriginal020f66f7c7b8c356eb995e6f46315839); ?>
<?php endif; ?><br><br><br>

            <div class="back_formulaire">
                <h4 class="info_form">Mes Produits Favoris</h4>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($favoris->count() > 0): ?>
                <div class="btq_content">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $favoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $produit = $favori->produit;
                        ?>
                        <div class="section_produit_details">
                            <a href="<?php echo e(route('produit.show', $produit->id)); ?>" style="text-decoration: none; color: inherit;">
                                <div class="btq_section_image">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produit->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $produit->image)); ?>" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                                    <?php elseif($produit->urlimg): ?>
                                        <img src="<?php echo e($produit->urlimg->url); ?>" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/300" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <i class="fa-solid fa-heart favorite-icon active" data-produit-id="<?php echo e($produit->id); ?>" style="cursor: pointer;"></i>
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
                                            <h5 class="prix_fixe"><?php echo e(number_format($produit->prix, 0, ',', ' ')); ?> FCFA</h5>
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
            <?php else: ?>
                <div class="text-center" style="padding: 50px;">
                    <i class="fa-regular fa-heart" style="font-size: 64px; color: #ccc; margin-bottom: 20px;"></i>
                    <h3>Aucun produit favori</h3>
                    <p>Vous n'avez pas encore ajouté de produits à vos favoris.</p>
                    <a href="<?php echo e(route('produits.liste')); ?>" class="btn_discussion" style="margin-top: 20px; display: inline-block;">Découvrir les produits</a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>            
        </div>

    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
            if (data.action === 'removed') {
                // Retirer le produit de la page
                iconElement.closest('.section_produit_details').remove();
                
                // Vérifier s'il reste des produits
                if (document.querySelectorAll('.section_produit_details').length === 0) {
                    location.reload();
                }
            }
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/client/favoris.blade.php ENDPATH**/ ?>