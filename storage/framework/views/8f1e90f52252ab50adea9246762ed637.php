<?php $__env->startSection('title', 'Informations du vendeur'); ?>

<?php $__env->startSection('header'); ?>

    <section class="title_dash">
        <div>
            <h1>DASHBOARD</h1>
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
                <h4 class="info_form">Informations Personnelles</h4>

                <table class="table_dash_info">
                    <tr>
                        <td><strong>Nom</strong></td>
                        <td><?php echo e($user->nom); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Prénom</strong></td>
                        <td><?php echo e($user->prenom); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo e($user->email); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Rôle</strong></td>
                        <td><?php echo e($user->role->name ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Membre depuis</strong></td>
                        <td><?php echo e($user->created_at->format('d/m/Y')); ?></td>
                    </tr>
                </table>
                
            </div>            
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/information.blade.php ENDPATH**/ ?>