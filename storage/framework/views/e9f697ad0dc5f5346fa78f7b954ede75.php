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

        <div class="section_dash" id="pate">
            
            <div id="back_formulaire" style="max-width: 1500px; margin: 0 auto;">
                <h6 class="info_form">Finalisation de la commande</h6>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger" style="margin-bottom: 10px; border-radius: 12px;">
                        <ul class="mb-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form action="<?php echo e(route('commandes.store')); ?>" method="POST" style="background: white; padding: 0 30px 30px 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                    <?php echo csrf_field(); ?>

                    <!-- Informations Client & Date (Top like Edit View) -->
                    <div class="section_form_two" style="margin-bottom: 40px;">
                        <h5 style="color: #92400E; font-weight: 700; margin-bottom: 25px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                            <i class="fa-solid fa-user-pen" style="margin-right: 10px;"></i>
                            Informations Générales
                        </h5>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                            
                            <div class="form_info" style="display: flex; flex-direction: column; gap: 8px;">
                                <label for="email_client" style="font-weight: 600; color: #374151;">Email du client <span style="color: #dc2626;">*</span></label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-envelope" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
                                    <input type="email" 
                                           name="email_client" 
                                           id="email_client"
                                           value="<?php echo e(old('email_client')); ?>" 
                                           class="input_ajout" 
                                           style="width: 100%; padding: 10px 10px 10px 35px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s;"
                                           placeholder="exemple@email.com"
                                           required>
                                </div>
                                <small style="color: #6b7280; font-size: 0.85rem;"><i class="fa-solid fa-circle-info"></i> Le client doit avoir un compte sur la plateforme</small>
                            </div>

                            <div class="form_info" style="display: flex; flex-direction: column; gap: 8px;">
                                <label for="date_commande" style="font-weight: 600; color: #374151;">Date de la commande <span style="color: #dc2626;">*</span></label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-calendar-days" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
                                    <input type="date" 
                                           name="date_commande" 
                                           id="date_commande"
                                           value="<?php echo e(old('date_commande', date('Y-m-d'))); ?>" 
                                           class="input_ajout" 
                                           style="width: 100%; padding: 10px 10px 10px 35px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem;"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Résumé des produits (Bottom like Edit View) -->
                    <div class="summary-section">
                        <h5 style="color: #92400E; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                            <i class="fa-solid fa-cart-shopping" style="margin-right: 10px;"></i>
                            Résumé des produits sélectionnés
                        </h5>
                        
                        <table class="table_dash" style="width: 100%; margin-bottom: 20px;">
                            <thead>
                                <tr style="background-color: #FEF3C7; color: #92400E;">
                                    <th style="padding: 12px;">Produit</th>
                                    <th style="padding: 12px; text-align: center;">Quantité</th>
                                    <th style="padding: 12px; text-align: right;">Prix Unitaire</th>
                                    <th style="padding: 12px; text-align: right;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total = 0;
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $produitsSelectionnes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produitData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $produit = \App\Models\Produits::find($produitData['id']);
                                        $sousTotal = $produitData['prix_unitaire'] * $produitData['quantite'];
                                        $total += $sousTotal;
                                    ?>
                                    <tr style="border-bottom: 1px solid #f3f4f6;">
                                        <td style="padding: 12px; font-weight: 500;"><?php echo e($produit->nom); ?></td>
                                        <td style="padding: 12px; text-align: center;"><?php echo e($produitData['quantite']); ?></td>
                                        <td style="padding: 12px; text-align: right;"><?php echo e(number_format($produitData['prix_unitaire'], 0, ',', ' ')); ?> FCFA</td>
                                        <td style="padding: 12px; text-align: right; color: #B45309; font-weight: 600;"><?php echo e(number_format($sousTotal, 0, ',', ' ')); ?> FCFA</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <tr style="background-color: #fce7f3; font-weight: bold;">
                                    <td colspan="3" style="padding: 15px; text-align: right; font-size: 1.1em; color: #92400E;">Montant Total à Payer :</td>
                                    <td style="padding: 15px; text-align: right; font-size: 1.2em; color: #92400E;"><?php echo e(number_format($total, 0, ',', ' ')); ?> FCFA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Actions -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #f3f4f6;">
                        <a href="<?php echo e(route('commandes.create')); ?>" class="btn btn-secondary" style="background: #ffffffff; color: #B45309; font-weight: bold; padding: 10px 20px; border-radius: 5px; border: 2px solid #B45309 ; text-decoration: none; transition: all 0.3s;">
                            <i class="fa-solid fa-arrow-left" style="margin-right: 8px;"></i> Retour
                        </a>
                        <button type="submit"  style="background: #B45309; color: white; padding: 12px 30px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 1rem; box-shadow: 0 4px 6px -1px rgba(180, 83, 9, 0.2); transition: all 0.3s;">
                            <i class="fa-solid fa-check" style="margin-right: 8px;"></i> Confirmer la commande
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/commandes/form.blade.php ENDPATH**/ ?>