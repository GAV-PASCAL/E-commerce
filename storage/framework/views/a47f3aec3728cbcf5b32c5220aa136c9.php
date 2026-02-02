

<?php $__env->startSection('title', 'Détails de la commande'); ?>

<?php $__env->startSection('header'); ?>

    <section>
        <div class="title_dash">
            <div>
                <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Logo" width="100px" height="50px">
            </div>
            <div class="conversation-header-page">
                <a href="<?php echo e(url('./produits')); ?>" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="dashboard_container">
        
        <div class="dashboard_sidebar_wrapper">
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
        </div> 

        <div class="dashboard_content">

            <div id="back_formulaire">
                <div class="commande-header-flex" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h6 class="info_form">Fiche de Commande <?php echo e($commande->numero_fiche); ?></h6>
                    <div class="commande-buttons-group" style="display: flex; gap: 10px; flex-direction: row;">
                        <a href="<?php echo e(route('commandes.pdf', $commande)); ?>" 
                           class="btn btn-success" 
                           style="background: #B45309; color: white; padding: 10px 20px; border-radius: 5px; border: 2px solid #ffffff; text-decoration: none;">
                            📄 Télécharger PDF
                        </a>
                        <a href="<?php echo e(route('client.commandes')); ?>" 
                           class="btn btn-secondary" 
                           style="background: #ffffffff; color: #B45309; font-weight: bold; padding: 10px 20px; border-radius: 5px; border: 2px solid #B45309 ; text-decoration: none;">
                            Retour
                        </a>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- Informations générales -->
                <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
                    <h5 style="margin-bottom: 15px; color: #333;">Informations de la commande</h5>
                    <div class="info-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                        <div>
                            <strong>Numéro de fiche :</strong> <?php echo e($commande->numero_fiche); ?>

                        </div>
                        <div>
                            <strong>Date :</strong> <?php echo e($commande->date_commande->format('d/m/Y')); ?>

                        </div>
                        <div>
                            <strong>Votre nom :</strong> <?php echo e($commande->user->nom); ?> <?php echo e($commande->user->prenom); ?>

                        </div>
                        <div>
                            <strong>Votre email :</strong> <?php echo e($commande->user->email); ?>

                        </div>
                        <div>
                            <strong>Statut :</strong> 
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($commande->statut === 'en_attente'): ?>
                                <span style="background: #ffc107; color: #000; padding: 5px 10px; border-radius: 5px;">
                                    En attente de validation
                                </span>
                            <?php elseif($commande->statut === 'validee'): ?>
                                <span style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                    Validée
                                </span>
                            <?php else: ?>
                                <span style="background: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                    Annulée
                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <strong>Montant total :</strong> 
                            <span style="font-size: 1.2em; color: #28a745;">
                                <?php echo e(number_format($commande->montant_total, 0, ',', ' ')); ?> FCFA
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Liste des produits -->
                <h5 style="color: #333;">Produits commandés</h5>
                <table class="table_dash">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $commande->produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($produit->nom); ?></td>
                                <td><?php echo e(number_format($produit->pivot->prix_unitaire, 0, ',', ' ')); ?> FCFA</td>
                                <td><?php echo e($produit->pivot->quantite); ?></td>
                                <td><?php echo e(number_format($produit->pivot->prix_total, 0, ',', ' ')); ?> FCFA</td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold; background: #f8f9fa;">
                            <td colspan="3" style="text-align: right;">TOTAL :</td>
                            <td><?php echo e(number_format($commande->montant_total, 0, ',', ' ')); ?> FCFA</td>
                        </tr>
                    </tfoot>
                </table>

                <!-- Bouton de validation -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($commande->statut === 'en_attente'): ?>
                    <div style="margin-top: 10px; padding: 10px; ">
                        <!-- <h5 style="color: #856404; margin-bottom: 15px;">⚠️ Action requise</h5>
                        <p style="color: #856404; margin-bottom: 15px;">
                            Cette commande est en attente de votre validation. Veuillez vérifier les détails ci-dessus et accepter la commande si tout est correct.
                        </p> -->
                        <form action="<?php echo e(route('client.commandes.valider', $commande)); ?>" 
                              method="POST" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir valider cette commande ? Cette action est irréversible.');">
                            <?php echo csrf_field(); ?>
                            <button type="submit" 
                                    class="input_register" 
                                    style="background: #28a745; padding: 15px 30px; font-size: 1.1em;">
                                Accepter cette commande
                            </button>
                        </form>
                    </div>
                <?php elseif($commande->statut === 'validee'): ?>
                    <div style="margin-top: 30px; padding: 20px; background: #f5f5dc; border-radius: 10px; border: 2px solid #B45309;">
                        <h5 style="color: #B45309; margin-bottom: 10px;">Commande validée</h5>
                        <p style="color: #B45309; margin-bottom: 0;">
                            Vous avez validé cette commande le <?php echo e($commande->updated_at->format('d/m/Y à H:i')); ?>.
                        </p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>            
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/client/commande-detail.blade.php ENDPATH**/ ?>