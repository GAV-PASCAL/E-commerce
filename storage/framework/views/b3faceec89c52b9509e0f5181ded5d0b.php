

<?php $__env->startSection('title', 'Modifier la commande'); ?>

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
                <h6 class="info_form">Modifier la commande <?php echo e($commande->numero_fiche); ?></h6>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger" style="margin-bottom: 20px; border-radius: 12px;">
                        <ul class="mb-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form action="<?php echo e(route('commandes.update', $commande->id)); ?>" method="POST" id="editForm" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- Informations Client & Date -->
                    <div class="section_form_two" style="margin-bottom: 40px;">
                        <h5 style="color: #92400E; font-weight: 700; margin-bottom: 25px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                            <i class="fa-solid fa-user-pen" style="margin-right: 10px;"></i>
                            Informations Générales
                        </h5>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                            
                            <!-- Client Info (Read-only) -->
                            <div class="form_info" style="display: flex; flex-direction: column; gap: 8px;">
                                <label style="font-weight: 600; color: #374151;">Client</label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-user" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
                                    <input type="text" 
                                           value="<?php echo e($commande->user->nom); ?> <?php echo e($commande->user->prenom); ?> (<?php echo e($commande->user->email); ?>)" 
                                           class="input_ajout" 
                                           style="width: 100%; padding: 10px 10px 10px 35px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; background-color: #f9fafb; color: #4b5563;"
                                           readonly disabled>
                                </div>
                            </div>

                            <!-- Date Info -->
                            <div class="form_info" style="display: flex; flex-direction: column; gap: 8px;">
                                <label for="date_commande" style="font-weight: 600; color: #374151;">Date de la commande <span style="color: #dc2626;">*</span></label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-calendar-days" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
                                    <input type="date" 
                                           name="date_commande" 
                                           id="date_commande"
                                           value="<?php echo e(old('date_commande', $commande->date_commande->format('Y-m-d'))); ?>" 
                                           class="input_ajout" 
                                           style="width: 100%; padding: 10px 10px 10px 35px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem;"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produits Section -->
                    <div class="produits-section">
                        <h5 style="color: #92400E; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #FEF3C7; padding-bottom: 10px;">
                            <i class="fa-solid fa-cart-shopping" style="margin-right: 10px;"></i>
                            Produits de la commande
                        </h5>
                        
                        <div class="produit_search" style="margin-bottom: 20px;">
                            <div style="position: relative;">
                                <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
                                <input type="search" id="searchInput" placeholder="Rechercher un produit à ajouter..." class="produit_search_input" style="width: 100%; padding: 12px 12px 12px 40px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem;">
                            </div>
                        </div>

                        <div style="border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; margin-bottom: 30px;">
                            <table class="table_dash" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background-color: #FEF3C7; color: #92400E;">
                                        <th style="padding: 12px; text-align: center;">Sélection</th>
                                        <th style="padding: 12px;">Nom du produit</th>
                                        <th style="padding: 12px;">Catégorie</th>
                                        <th style="padding: 12px; text-align: right;">Prix Unitaire (FCFA)</th>
                                        <th style="padding: 12px; text-align: right;">Quantité</th>
                                    </tr>
                                </thead>

                                <tbody id="produitsTable">
                                    <?php
                                        $produitsCommande = $commande->produits->pluck('id')->toArray();
                                    ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $isSelected = in_array($produit->id, $produitsCommande);
                                            $produitCommande = $isSelected ? $commande->produits->firstWhere('id', $produit->id) : null;
                                        ?>
                                        <tr class="produit-row" data-nom="<?php echo e(strtolower($produit->nom)); ?>" style="border-bottom: 1px solid #f3f4f6; transition: background-color 0.2s;">
                                            <td style="padding: 12px; text-align: center;">
                                                <input type="checkbox" 
                                                       class="produit-checkbox" 
                                                       data-id="<?php echo e($produit->id); ?>" 
                                                       value="<?php echo e($produit->id); ?>"
                                                       <?php echo e($isSelected ? 'checked' : ''); ?>

                                                       style="width: 18px; height: 18px; cursor: pointer;">
                                            </td>
                                            <td style="padding: 12px; font-weight: 500;"><?php echo e($produit->nom); ?></td>
                                            <td style="padding: 12px; color: #6b7280;"><?php echo e($produit->categorie->nom ?? 'N/A'); ?></td>
                                            <td style="padding: 12px; text-align: right;">
                                                <input type="number" 
                                                       class="input_number prix-input" 
                                                       data-id="<?php echo e($produit->id); ?>"
                                                       name="produits[<?php echo e($produit->id); ?>][prix_unitaire]" 
                                                       placeholder="Prix"
                                                       min="0"
                                                       step="0.01"
                                                       value="<?php echo e($isSelected ? $produitCommande->pivot->prix_unitaire : ''); ?>"
                                                       <?php echo e($isSelected ? '' : 'disabled'); ?>

                                                       style="width: 120px; padding: 6px; border: 1px solid #d1d5db; border-radius: 6px; text-align: right;">
                                            </td>
                                            <td style="padding: 12px; text-align: right;">
                                                <input type="number" 
                                                       class="input_number quantite-input" 
                                                       data-id="<?php echo e($produit->id); ?>"
                                                       name="produits[<?php echo e($produit->id); ?>][quantite]" 
                                                       placeholder="Qté"
                                                       min="1"
                                                       value="<?php echo e($isSelected ? $produitCommande->pivot->quantite : ''); ?>"
                                                       <?php echo e($isSelected ? '' : 'disabled'); ?>

                                                       style="width: 80px; padding: 6px; border: 1px solid #d1d5db; border-radius: 6px; text-align: right;">
                                                <input type="hidden" name="produits[<?php echo e($produit->id); ?>][id]" value="<?php echo e($produit->id); ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #f3f4f6;">
                        <a href="<?php echo e(route('commandes.index')); ?>" 
                           class="btn btn-secondary" 
                           style="background: #ffffffff; color: #B45309; font-weight: bold; padding: 10px 20px; border-radius: 8px; border: 2px solid #B45309; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-arrow-left"></i> Retour
                        </a>
                        <button type="submit" id="submitBtn" style="background: #B45309; color: white; padding: 12px 30px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 1rem; box-shadow: 0 4px 6px -1px rgba(180, 83, 9, 0.2); transition: all 0.3s; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-rotate"></i> Mettre à jour la commande
                        </button>
                    </div>

                </form>
            </div>            
        </div>
    </div>

    <script>
        // Gestion de la recherche
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.produit-row');
            
            rows.forEach(row => {
                const nom = row.getAttribute('data-nom');
                if (nom.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Gestion des checkboxes et inputs
        document.querySelectorAll('.produit-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const produitId = this.getAttribute('data-id');
                const prixInput = document.querySelector(`.prix-input[data-id="${produitId}"]`);
                const quantiteInput = document.querySelector(`.quantite-input[data-id="${produitId}"]`);
                
                if (this.checked) {
                    prixInput.disabled = false;
                    quantiteInput.disabled = false;
                    prixInput.required = true;
                    quantiteInput.required = true;
                } else {
                    prixInput.disabled = true;
                    quantiteInput.disabled = true;
                    prixInput.required = false;
                    quantiteInput.required = false;
                    prixInput.value = '';
                    quantiteInput.value = '';
                }
                
                updateSubmitButton();
            });
        });

        // Activer/désactiver le bouton submit
        function updateSubmitButton() {
            const checkedBoxes = document.querySelectorAll('.produit-checkbox:checked');
            const submitBtn = document.getElementById('submitBtn');
            
            if (checkedBoxes.length > 0) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        // Validation avant soumission
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const checkedBoxes = document.querySelectorAll('.produit-checkbox:checked');
            
            if (checkedBoxes.length === 0) {
                e.preventDefault();
                alert('Veuillez sélectionner au moins un produit.');
                return false;
            }
            
            let isValid = true;
            
            checkedBoxes.forEach(checkbox => {
                const produitId = checkbox.getAttribute('data-id');
                const prixInput = document.querySelector(`.prix-input[data-id="${produitId}"]`);
                const quantiteInput = document.querySelector(`.quantite-input[data-id="${produitId}"]`);
                
                if (!prixInput.value || parseFloat(prixInput.value) <= 0) {
                    isValid = false;
                    alert('Veuillez renseigner un prix valide pour tous les produits sélectionnés.');
                    return false;
                }
                
                if (!quantiteInput.value || parseInt(quantiteInput.value) <= 0) {
                    isValid = false;
                    alert('Veuillez renseigner une quantité valide pour tous les produits sélectionnés.');
                    return false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/commandes/edit.blade.php ENDPATH**/ ?>