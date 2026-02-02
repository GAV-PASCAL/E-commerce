<?php $__env->startSection('title', 'Informations du client'); ?>

<?php $__env->startSection('header'); ?>

    <section>
        <div class="title_dash">
            <div>
                <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Logo" width="100px" height="50px">
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
        <div style="background-color: #B45309; flex-basis: 22%; border-right: 1px solid #B45309;">
            <div style="height: 100vh;">
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
            </div>
        </div>

        <div class="section_dash" id="patie">

            <div id="back_formulaire">
                <h6 class="info_form">Informations du client pour la commande</h6>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- Résumé des produits sélectionnés -->
                <div class="alert alert-info">
                    <h5>Produits sélectionnés :</h5>
                    <ul>
                        <?php
                            $total = 0;
                        ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $produitsSelectionnes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produitData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $produit = \App\Models\Produits::find($produitData['id']);
                                $sousTotal = $produitData['prix_unitaire'] * $produitData['quantite'];
                                $total += $sousTotal;
                            ?>
                            <li>
                                <strong><?php echo e($produit->nom); ?></strong> - 
                                <?php echo e($produitData['quantite']); ?> x <?php echo e(number_format($produitData['prix_unitaire'], 0, ',', ' ')); ?> FCFA = 
                                <strong><?php echo e(number_format($sousTotal, 0, ',', ' ')); ?> FCFA</strong>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                    <hr>
                    <h5>Montant total : <strong><?php echo e(number_format($total, 0, ',', ' ')); ?> FCFA</strong></h5>
                </div>

                <form action="<?php echo e(route('commandes.store')); ?>" class="exp" method="POST">
                    <?php echo csrf_field(); ?>

                   <div class="section_form_two">
                        <div class="form_info">
                            <label for="email_client">Email du client *</label>
                            <input type="email" 
                                   name="email_client" 
                                   id="email_client"
                                   value="<?php echo e(old('email_client')); ?>" 
                                   class="input_ajout" 
                                   placeholder="exemple@email.com"
                                   required>
                            <small>Le client doit avoir un compte sur la plateforme</small>
                        </div>

                        <div class="form_info">
                            <label for="date_commande">Date de la commande *</label>
                            <input type="date" 
                                   name="date_commande" 
                                   id="date_commande"
                                   value="<?php echo e(old('date_commande', date('Y-m-d'))); ?>" 
                                   class="input_ajout" 
                                   required>
                        </div>

                        <div style="display: flex; gap: 10px;">
                            <a href="<?php echo e(route('commandes.create')); ?>" class="btn btn-secondary">
                                Retour à la sélection
                            </a>
                            <button type="submit" class="input_register">
                                Créer la fiche de commande
                            </button>
                        </div>
                   </div>

                </form>
            </div>            
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/commandes/form.blade.php ENDPATH**/ ?>