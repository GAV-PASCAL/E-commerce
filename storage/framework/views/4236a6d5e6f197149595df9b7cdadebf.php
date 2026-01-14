<?php $__env->startSection('title', 'Ajouter produits'); ?>

<?php $__env->startSection('header'); ?>

    <section>
        <div class="title_dash">
            <div>
                <h1>DASHBOARD</h1>
            </div>
            <div class="conversation-header-page">
                <a href="<?php echo e(url('./')); ?>" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div id="page_structure">
        <?php if (isset($component)) { $__componentOriginal7198df49fa33acdb115e04e2e99942a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7198df49fa33acdb115e04e2e99942a4 = $attributes; } ?>
<?php $component = App\View\Components\Dashheader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Dashheader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7198df49fa33acdb115e04e2e99942a4)): ?>
<?php $attributes = $__attributesOriginal7198df49fa33acdb115e04e2e99942a4; ?>
<?php unset($__attributesOriginal7198df49fa33acdb115e04e2e99942a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7198df49fa33acdb115e04e2e99942a4)): ?>
<?php $component = $__componentOriginal7198df49fa33acdb115e04e2e99942a4; ?>
<?php unset($__componentOriginal7198df49fa33acdb115e04e2e99942a4); ?>
<?php endif; ?>

        <div class="section_dash" id="patie">

            <div class="back_formulaire">
                <h4 class="info_form">Formulaire de création de produits</h4>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form action="<?php echo e(route('dashbord.vendeur.produits.store')); ?>" class="exp" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="section_form_one">
                        <div class="form_info">
                            <label for="nom">Nom du produit</label>
                            <input type="text" name="nom" value="<?php echo e(old('nom')); ?>" placeholder="Nom du produit" class="input_ajout" required>
                        </div>

                        <div class="form_info">
                            <label for="description">Description du produit</label>
                            <textarea name="description" id="description" class="input_ajout" style="height: 80px;" required><?php echo e(old('description')); ?></textarea>
                        </div>

                        <div class="form_info">
                            <label for="url_image">URL de l'image (optionnel)</label>
                            <input type="url" name="url_image" value="<?php echo e(old('url_image')); ?>" class="input_ajout" placeholder="https://example.com/image.jpg">
                        </div>
                    </div>

                   <div class="section_form_two" style="margin-top: 30px;">
                        <div class="form_info">
                            <label for="prix">Prix du produit (FCFA)</label>
                            <input type="number" name="prix" value="<?php echo e(old('prix')); ?>" class="input_ajout" min="0" step="0.01" required>
                        </div>

                        <div class="form_info">
                            <label for="qte_min">Quantité minimale</label>
                            <input type="number" name="qte_min" value="<?php echo e(old('qte_min')); ?>" class="input_ajout" min="1" required>
                        </div> 
                        
                        <div class="form_info">
                            <label for="categorie_id">Catégorie</label>
                            <select name="categorie_id" id="categorie_id" class="input_ajout" required>
                                <option value="">Sélectionner une catégorie</option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categorie->id); ?>" <?php echo e(old('categorie_id') == $categorie->id ? 'selected' : ''); ?>>
                                        <?php echo e($categorie->nom); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </select>
                        </div>
                        
                        <div class="form_info">
                            <label for="image">Image du produit (optionnel)</label>
                            <input type="file" name="image" id="image" class="input_file" accept="image/*">
                        </div>

                        <div>
                            <input type="submit" value="Enregistrer" class="input_register">
                        </div>
                   </div>

                </form>
            </div>            
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/produits/ajouter.blade.php ENDPATH**/ ?>