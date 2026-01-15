<?php $__env->startSection('title', 'Créer une fiche de commande'); ?>

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

        <div class="section_dash">
            <section id="head_search">

                <div class="produit_search">
                    <div class="produit_search">
                        <input type="search" id="searchInput" placeholder="Rechercher un produit" class="produit_search_input">
                    </div>
                </div>
            </section>

            <div id="back_formulaire">

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

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form action="<?php echo e(route('commandes.store-selection')); ?>" method="POST" id="commandeForm">
                    <?php echo csrf_field(); ?>

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
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="produit-row" data-nom="<?php echo e(strtolower($produit->nom)); ?>">
                                    <td>
                                        <input type="checkbox" class="produit-checkbox" data-id="<?php echo e($produit->id); ?>" value="<?php echo e($produit->id); ?>">
                                    </td>
                                    <td><?php echo e($produit->nom); ?></td>
                                    <td><?php echo e($produit->categorie->nom ?? 'N/A'); ?></td>
                                    <td>
                                        <input type="number" 
                                               class="input_number prix-input" 
                                               data-id="<?php echo e($produit->id); ?>"
                                               placeholder="Prix"
                                               min="0"
                                               step="0.01"
                                               disabled>
                                    </td>
                                    <td>
                                        <input type="number" 
                                               class="input_number quantite-input" 
                                               data-id="<?php echo e($produit->id); ?>"
                                               placeholder="Qté"
                                               min="1"
                                               disabled>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>

                    <div style="margin-top: 20px; text-align: right;">
                        <button type="submit" class="input_register" id="submitBtn" disabled>
                            Continuer vers le formulaire client
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

        // Validation et nettoyage avant soumission
        document.getElementById('commandeForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Empêcher la soumission par défaut
            
            const checkedBoxes = document.querySelectorAll('.produit-checkbox:checked');
            let isValid = true;
            let produitsData = [];
            
            // Valider et collecter les données des produits sélectionnés
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
                
                // Collecter les données valides
                produitsData.push({
                    id: produitId,
                    prix_unitaire: prixInput.value,
                    quantite: quantiteInput.value
                });
            });
            
            if (!isValid) {
                return;
            }
            
            // Nettoyer le formulaire et n'ajouter que les produits sélectionnés
            const form = this;
            
            // Supprimer tous les anciens inputs de produits
            form.querySelectorAll('input[name^="produits["]').forEach(input => {
                input.remove();
            });
            
            
            // Ajouter uniquement les produits sélectionnés avec un index séquentiel
            produitsData.forEach((produit, index) => {
                // Créer les inputs cachés pour chaque produit
                const inputId = document.createElement('input');
                inputId.type = 'hidden';
                inputId.name = `produits[${index}][id]`;
                inputId.value = produit.id;
                form.appendChild(inputId);
                
                const inputPrix = document.createElement('input');
                inputPrix.type = 'hidden';
                inputPrix.name = `produits[${index}][prix_unitaire]`;
                inputPrix.value = produit.prix_unitaire;
                form.appendChild(inputPrix);
                
                const inputQuantite = document.createElement('input');
                inputQuantite.type = 'hidden';
                inputQuantite.name = `produits[${index}][quantite]`;
                inputQuantite.value = produit.quantite;
                form.appendChild(inputQuantite);
                
                console.log(`Produit ${index}:`, {
                    id: produit.id,
                    prix_unitaire: produit.prix_unitaire,
                    quantite: produit.quantite
                });
            });
            
            console.log('Données à envoyer:', produitsData);
            console.log('Formulaire avant soumission:', new FormData(form));
            
            // Soumettre le formulaire
            form.submit();
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/commandes/create.blade.php ENDPATH**/ ?>