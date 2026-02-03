<?php $__env->startSection('title', 'liste des produits'); ?>

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
            <section id="head_search">

                <div class="produit_search">
                    <input type="search" placeholder="Rechercher un produit" class="produit_search_input">
                    <a href="<?php echo e(route('dashbord.vendeur.produits.ajouter')); ?>" class="btn-add" id="btn_ajout">
                        <i class="fa fa-plus"></i>
                        Ajouter
                    </a>
                </div>

                <div class="product-filters">
                    <a href="<?php echo e(route('dashbord.vendeur.produits.index')); ?>" class="btn-filter <?php echo e(!request('filter') ? 'active' : ''); ?>">Tous les produits</a>
                    <a href="<?php echo e(route('dashbord.vendeur.produits.index', ['filter' => 'active'])); ?>" class="btn-filter <?php echo e(request('filter') === 'active' ? 'active' : ''); ?>">Actifs</a>
                    <a href="<?php echo e(route('dashbord.vendeur.produits.index', ['filter' => 'inactive'])); ?>" class="btn-filter <?php echo e(request('filter') === 'inactive' ? 'active' : ''); ?>">Inactifs</a>
                </div>

                <style>
                    .product-filters {
                        display: flex;
                        gap: 10px;
                        margin-bottom: 20px;
                    }
                    .btn-filter {
                        padding: 8px 15px;
                        background: #f4f4f4;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        text-decoration: none;
                        color: #333;
                        font-size: 14px;
                        transition: all 0.3s;
                    }
                    .btn-filter.active {
                        background: #B45309;
                        color: white;
                        border-color: #B45309;
                    }
                    .badge {
                        padding: 4px 8px;
                        border-radius: 4px;
                        font-size: 11px;
                        font-weight: bold;
                        text-transform: uppercase;
                    }
                    .badge-success { background: #d4edda; color: #155724; }
                    .badge-danger { background: #f8d7da; color: #721c24; }
                </style>
            </section>

            <section class="produits_liste">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div>
                    <table class="table_dash" id='tble_btn'> 
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Prix du produit</th>
                                <th>Qte. Min</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($produit->nom); ?></td>
                                    <td><?php echo e($produit->categorie->nom ?? 'N/A'); ?></td>
                                    <td><?php echo e(number_format($produit->prix, 0, ',', ' ')); ?> FCFA</td>
                                    <td><?php echo e($produit->qte_min); ?></td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produit->is_active): ?>
                                            <span class="badge badge-success">Actif</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Inactif</span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    
                                    <td class="table_action">
                                        <a href="<?php echo e(route('dashbord.vendeur.produits.edit', $produit)); ?>" 
                                                class="btn btn-primary" 
                                                style="background: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="<?php echo e(route('dashbord.vendeur.produits.toggle-status', $produit)); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn <?php echo e($produit->is_active ? 'btn-warning' : 'btn-success'); ?>" 
                                                    title="<?php echo e($produit->is_active ? 'Désactiver' : 'Activer'); ?>"
                                                    style="padding: 5px 10px; border-radius: 5px;">
                                                <i class="fa-solid <?php echo e($produit->is_active ? 'fa-eye-slash' : 'fa-eye'); ?>"></i>
                                            </button>
                                        </form>
                                        
                                        <form action="<?php echo e(route('dashbord.vendeur.produits.destroy', $produit)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit dans votre liste?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                             <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i> 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                <td colspan="7" style="text-align:center;">Aucun produit trouvé</td>
                                </tr>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <?php echo e($produits->links()); ?>

                </div>
            </section>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.produit_search_input');
            const tableBody = document.querySelector('.table_dash tbody');

            if (searchInput && tableBody) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const rows = tableBody.querySelectorAll('tr');

                    if (searchTerm.length < 2) {
                        rows.forEach(row => row.style.display = '');
                        return;
                    }

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/produits/index.blade.php ENDPATH**/ ?>