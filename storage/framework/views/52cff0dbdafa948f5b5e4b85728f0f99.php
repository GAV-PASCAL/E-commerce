<?php $__env->startSection('title', 'Mes Commandes'); ?>

<?php $__env->startSection('header'); ?>

    <div class="title_dash">
        <h1>DASHBOARD</h1>
    </div>

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

        <div class="section_dash">
            <section id="head_search">
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
<?php endif; ?>

                <div class="produit_search">
                    <input type="search" placeholder="Rechercher un produit" class="produit_search_input">
                        <a href="<?php echo e(route('commandes.create')); ?>" class="produit_ajout_rapide" id="btn_ajout">
                            + Nouvelle
                        </a>
                </div>
            </section>

            <div class="back_formulaire">

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

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($commandes->isEmpty()): ?>
                    <div class="alert alert-info">
                        Aucune commande pour le moment. <a href="<?php echo e(route('commandes.create')); ?>">Créer une première commande</a>
                    </div>
                <?php else: ?>
                    <table class="table_dash">
                        <thead>
                            <tr>
                                <th>Numéro de Fiche</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Montant Total</th>
                                <th>Statut</th>
                                <th class="test">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong><?php echo e($commande->numero_fiche); ?></strong></td>
                                    <td><?php echo e($commande->user->nom); ?> <?php echo e($commande->user->prenom); ?></td>
                                    <td><?php echo e($commande->date_commande->format('d/m/Y')); ?></td>
                                    <td><?php echo e(number_format($commande->montant_total, 0, ',', ' ')); ?> FCFA</td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($commande->statut === 'en_attente'): ?>
                                            <span class="badge badge-warning" style="background: #ffc107; color: #000; padding: 5px 10px; border-radius: 5px;">
                                                En attente
                                            </span>
                                        <?php elseif($commande->statut === 'validee'): ?>
                                            <span class="badge badge-success" style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                                Validée
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-danger" style="background: #dc3545; color: #fff; padding: 5px 10px; border-radius: 5px;">
                                                Annulée
                                            </span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 10px;">
                                            <a href="<?php echo e(route('commandes.show', $commande->id)); ?>" 
                                               class="btn btn-info" 
                                               style="background: #17a2b8; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                Voir
                                            </a>
                                            <a href="<?php echo e(route('commandes.edit', $commande->id)); ?>" 
                                               class="btn btn-primary" 
                                               style="background: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                Modifier
                                            </a>
                                            <form action="<?php echo e(route('commandes.destroy', $commande->id)); ?>" 
                                                  method="POST" 
                                                  style="display: inline;"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" 
                                                        class="btn btn-danger" 
                                                        style="background: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; border: none; cursor: pointer;">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>            
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/commandes/index.blade.php ENDPATH**/ ?>