

<?php $__env->startSection('title', 'Modifier la commande'); ?>

<?php $__env->startSection('header'); ?>

    <section>
        <div class="title_dash">
            <div>
                <h1>DASHBOARD</h1>
            </div>
            <div class="conversation-header-page">
                <a href="<?php echo e(route('conversations.index')); ?>" class="back-btn">
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

        <div class="section_dash">

            <div class="back_formulaire" id="parie">
                <h6 class="info_form">Modifier la commande <?php echo e($commande->numero_fiche); ?></h6>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="alert alert-info">
                    <strong>Client :</strong> <?php echo e($commande->user->nom); ?> <?php echo e($commande->user->prenom); ?> (<?php echo e($commande->user->email); ?>)
                </div>

                <form action="<?php echo e(route('commandes.update', $commande->id)); ?>" method="POST" id="editForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="section_form_two">
                        <div class="form_info">
                            <label for="date_commande">Date de la commande *</label>
                            <input type="date" 
                                   name="date_commande" 
                                   id="date_commande"
                                   value="<?php echo e(old('date_commande', $commande->date_commande->format('Y-m-d'))); ?>" 
                                   class="input_ajout" 
                                   required>
                        </div>
                    </div>

                    <h5 style="margin-top: 30px; margin-bottom: 15px;">Produits de la commande</h5>
                    
                    <div class="produit_search">
                        <input type="search" id="searchInput" placeholder="Rechercher un produit" class="produit_search_input">
                    </div>

                    <table class="table_dash">
                        <thead>
                            <tr>
                                <th class="test">Sélection</th>
                                <th>Nom du produit</th>
                                <th>Catégorie</th>
                                <th>Prix Unitaire (FCFA)</th>
                                <th>Quantité</th>
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
                                <tr class="produit-row" data-nom="<?php echo e(strtolower($produit->nom)); ?>">
                                    <td>
                                        <input type="checkbox" 
                                               class="produit-checkbox" 
                                               data-id="<?php echo e($produit->id); ?>" 
                                               value="<?php echo e($produit->id); ?>"
                                               <?php echo e($isSelected ? 'checked' : ''); ?>>
                                    </td>
                                    <td><?php echo e($produit->nom); ?></td>
                                    <td><?php echo e($produit->categorie->nom ?? 'N/A'); ?></td>
                                    <td>
                                        <input type="number" 
                                               class="input_number prix-input" 
                                               data-id="<?php echo e($produit->id); ?>"
                                               name="produits[<?php echo e($produit->id); ?>][prix_unitaire]" 
                                               placeholder="Prix"
                                               min="0"
                                               step="0.01"
                                               value="<?php echo e($isSelected ? $produitCommande->pivot->prix_unitaire : ''); ?>"
                                               <?php echo e($isSelected ? '' : 'disabled'); ?>>
                                    </td>
                                    <td>
                                        <input type="number" 
                                               class="input_number quantite-input" 
                                               data-id="<?php echo e($produit->id); ?>"
                                               name="produits[<?php echo e($produit->id); ?>][quantite]" 
                                               placeholder="Qté"
                                               min="1"
                                               value="<?php echo e($isSelected ? $produitCommande->pivot->quantite : ''); ?>"
                                               <?php echo e($isSelected ? '' : 'disabled'); ?>>
                                        <input type="hidden" name="produits[<?php echo e($produit->id); ?>][id]" value="<?php echo e($produit->id); ?>">
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>

                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <a href="<?php echo e(route('commandes.index')); ?>" class="btn btn-secondary">
                            Annuler
                        </a>
                        <button type="submit" class="input_register" id="submitBtn">
                            Mettre à jour la commande
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