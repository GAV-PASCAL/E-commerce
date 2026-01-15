<?php $__env->startSection('title', 'Nos Produits'); ?>

<?php $__env->startSection('header'); ?>

    <section>
        <div class="accueil_info">
            <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>

            <div class="exp_dim" id="info">
                <h3 class="titre_page">Nos Produits</h3>

                <p>Découvrez nos excellents produits de haute qualité</p>
            </div>
        </div>
        
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <form method="GET" action="<?php echo e(route('produits.liste')); ?>">
            <div class="btq_rapide">
                <input type="search" name="search" placeholder="Rechercher Produits..." class="btq_search" value="<?php echo e(request('search')); ?>">
            </div>

            <div class="section_side">
                <div class="sidebar_filtre">
                    <div>
                        <h3 class="filtre">Filtre</h3>
                        <div class="trie_section">
                            <p>Trier par</p>

                            <nav id="sidebar_navigation">
                                <button type="submit" name="sort" value="populaire" id="btq_trie_option">Plus populaire</button>
                    
                                <button type="submit" name="sort" value="prix_asc" id="btq_trie_option">Prix croissant</button>
                        
                                <button type="submit" name="sort" value="prix_desc" id="btq_trie_option">Prix décroissant</button>

                                <button  type="submit" name="sort" value="recent" id="btq_trie_option">Plus récents</button>
                            </nav>
                        </div>
                        <div class="trie_categorie">
                            <p>Catégorie</p>
                            <select name="categorie_id" id="categorie_id" onchange="this.form.submit()">
                                <option value="">Tous</option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categorie->id); ?>" <?php echo e(request('categorie_id') == $categorie->id ? 'selected' : ''); ?>>
                                        <?php echo e($categorie->nom); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </select>
                        </div>

                        <div>
                            <p>Filtre prix</p>
                            <div class="filtre_prix">
                                <div>
                                    <input type="number" name="prix_min" class="input_prix" placeholder="Min" value="<?php echo e(request('prix_min')); ?>">
                                    <p>De</p>
                                </div>
                                <div>
                                    <input type="number" name="prix_max" class="input_prix" placeholder="Max" value="<?php echo e(request('prix_max')); ?>">
                                    <p>À</p>
                                </div>
                                <div>
                                    <button type="submit" class="btn_discussion" id="btn" >Filtrer</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </form>

        <div class="btq_content">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="section_produit_details">
                    <a href="<?php echo e(route('produit.show', $produit->id)); ?>" style="text-decoration: none; color: inherit;">
                        <div class="btq_section_image">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($produit->image): ?>
                                <img src="<?php echo e(asset('storage/' . $produit->image)); ?>" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                            <?php elseif($produit->urlimg): ?>
                                <img src="<?php echo e($produit->urlimg->url); ?>" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300" alt="<?php echo e($produit->nom); ?>" class="produit_image">
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                <i class="fa-regular fa-heart favorite-icon" data-produit-id="<?php echo e($produit->id); ?>" style="cursor: pointer;"></i>
                            <?php else: ?>
                                <i class="fa-regular fa-heart" style="cursor: pointer;" onclick="window.location.href='<?php echo e(route('login')); ?>'"></i>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 
                        </div>
                        <div class="image_info">
                            <div>
                                <h4><?php echo e($produit->nom); ?></h4>
                            </div>
                            <div>
                                <p><small>Quantité min: <b><?php echo e($produit->qte_min); ?></b> unités</small></p>
                            </div>
                            <div class="prix_produit">
                                <div class="etoiles">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div>
                                    <h6 class="prix_fixe" ><?php echo e(number_format($produit->prix, 0, ',', ' ')); ?> FCFA</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="btn_section">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                            <button type="button" class="btn_discussion" onclick="window.location.href='<?php echo e(route('conversations.start', $produit->id)); ?>'">Discuter</button>
                            <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='<?php echo e(route('produit.show', $produit->id)); ?>'">Voir détails</button>
                        <?php else: ?>
                            <button type="button" class="btn_discussion" onclick="window.location.href='<?php echo e(route('login')); ?>'">Discuter</button>
                            <button type="button" class="btn_discussion" id="btn" onclick="window.location.href='<?php echo e(route('login')); ?>'">Proposition</button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center w-100">
                        <p>Aucun produit disponible pour le moment.</p>
                    </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        </div>

        <div class="pagination-container">
            <?php echo e($produits->links()); ?>

        </div>
    </section>

    <?php if (isset($component)) { $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $attributes; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Footer::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $attributes = $__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $component = $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Charger l'état des favoris au chargement de la page
        <?php if(auth()->guard()->check()): ?>
        loadFavorites();
        <?php endif; ?>

        // Gérer le clic sur les icônes de favoris
        document.querySelectorAll('.favorite-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const produitId = this.dataset.produitId;
                toggleFavorite(produitId, this);
            });
        });
    });

    function loadFavorites() {
        fetch('<?php echo e(route("favoris.ids")); ?>')
            .then(response => response.json())
            .then(data => {
                const favoriteIds = data.favorite_ids;
                
                document.querySelectorAll('.favorite-icon').forEach(icon => {
                    const produitId = parseInt(icon.dataset.produitId);
                    if (favoriteIds.includes(produitId)) {
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid', 'active');
                    }
                });
            })
            .catch(error => {
                console.error('Erreur lors du chargement des favoris:', error);
            });
    }

    function toggleFavorite(produitId, iconElement) {
        fetch('<?php echo e(route("favoris.toggle")); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({
                produit_id: produitId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.action === 'added') {
                    iconElement.classList.remove('fa-regular');
                    iconElement.classList.add('fa-solid', 'active');
                } else {
                    iconElement.classList.remove('fa-solid', 'active');
                    iconElement.classList.add('fa-regular');
                }
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }

    // Recherche client-side instantanée
    const searchInput = document.querySelector('.btq_search');
    const productItems = document.querySelectorAll('.section_produit_details');

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            // Si moins de 2 caractères, on réaffiche tout (ou on laisse l'état initial)
            if (searchTerm.length < 2 && searchTerm.length > 0) {
                 // Optionnel : on pourrait ne rien faire ou tout réafficher
                 // Ici on choisit de tout réafficher si l'utilisateur efface
                 productItems.forEach(item => item.style.display = '');
                 return;
            }
            
            // Si vide, on réaffiche tout
            if (searchTerm.length === 0) {
                 productItems.forEach(item => item.style.display = '');
                 return;
            }

            // Filtrage
            productItems.forEach(item => {
                const title = item.querySelector('h4').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/produits.blade.php ENDPATH**/ ?>