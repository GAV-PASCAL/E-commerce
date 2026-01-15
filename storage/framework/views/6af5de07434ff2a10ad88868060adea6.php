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
        </div> 

        <div class="section_dash">
            <button class="btn-edit">
                <i class="fa-solid fa-pen-to-square"></i>
                Modifier
            </button>
            <div id="back_formulaire">
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/client/information.blade.php ENDPATH**/ ?>