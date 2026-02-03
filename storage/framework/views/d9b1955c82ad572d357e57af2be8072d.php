

<?php $__env->startSection('title', 'Tableau de bord Vendeur'); ?>

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
<style>
    :root {
        --primary: #B45309;
        --secondary: #D97706;
        --bg-page: #F3F4F6;
        --card-bg: #FFFFFF;
        --text-main: #111827;
        --text-sub: #6B7280;
        --border: #E5E7EB;
    }

    #page_structure {
        background-color: var(--bg-page);
    }

    .analytics-container {
        max-width: 1600px;
        margin: 0 auto;
        padding: 30px;
        font-family: 'Inter', sans-serif;
    }

    .welcome-banner {
        margin-bottom: 35px;
    }

    .welcome-banner h1 {
        font-size: 1.75rem;
        color: var(--text-main);
        margin: 0;
        font-weight: 800;
    }

    .welcome-banner p {
        color: var(--text-sub);
        margin: 5px 0 0 0;
    }

    /* KPI Cards */
    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .kpi-card {
        background: var(--card-bg);
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        transition: transform 0.2s, box-shadow 0.2s;
        border: 1px solid var(--border);
        position: relative;
        overflow: hidden;
    }

    .kpi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .kpi-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-sub);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 12px;
        display: block;
    }

    .kpi-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-main);
        display: block;
    }

    .kpi-trend {
        margin-top: 15px;
        font-size: 0.85rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Layout Sections */
    .main-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .dashboard-panel {
        background: var(--card-bg);
        border-radius: 20px;
        border: 1px solid var(--border);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .panel-header {
        padding: 20px 25px;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .panel-header h3 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-main);
    }

    .panel-content {
        padding: 0;
    }

    /* Tables */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th {
        background: #F9FAFB;
        padding: 15px 25px;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-sub);
        text-transform: uppercase;
        border-bottom: 1px solid var(--border);
    }

    .custom-table td {
        padding: 18px 25px;
        border-bottom: 1px solid #F9FAFB;
        font-size: 0.9rem;
        color: var(--text-main);
    }

    .custom-table tr:last-child td {
        border-bottom: none;
    }

    .status-badge {
        padding: 5px 12px;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        display: inline-block;
    }

    /* Links */
    .action-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: color 0.2s;
    }

    .action-link:hover {
        color: var(--secondary);
    }
</style>

<div id="page_structure">
    <div style="background-color: var(--primary); flex-basis: 22%; border-right: 1px solid var(--primary);">
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

    <div class="section_dash" style="background: var(--bg-page);">
        <div class="analytics-container">
            
            <div class="welcome-banner">
                <h1>Tableau de bord analytique</h1>
                <p>Bienvenue, <?php echo e($user->prenom); ?>. Voici un aperçu de vos performances commerciales.</p>
            </div>

            <!-- KPIs -->
            <div class="kpi-grid" style="grid-template-columns: repeat(3, 1fr);">
                <div class="kpi-card" style="border-bottom: 4px solid var(--primary);">
                    <span class="kpi-label" style="color: var(--primary);">Chiffre d'Affaires</span>
                    <span class="kpi-value"><?php echo e(number_format($chiffreAffairesTotal, 0, ',', ' ')); ?> <small style="font-size: 1.1rem; opacity: 0.6;">CFA</small></span>
                    <div class="kpi-trend" style="color: #10B981;">
                        Basé sur <?php echo e($commandesAcceptees); ?> ventes validées
                    </div>
                </div>

                <div class="kpi-card" style="border-bottom: 4px solid #3B82F6;">
                    <span class="kpi-label" style="color: #2563EB;">Panier Moyen</span>
                    <span class="kpi-value"><?php echo e(number_format($panierMoyen, 0, ',', ' ')); ?> <small style="font-size: 1.1rem; opacity: 0.6;">CFA</small></span>
                    <div class="kpi-trend" style="color: var(--text-sub);">
                        Valeur moyenne par vente
                    </div>
                </div>

                <div class="kpi-card" style="border-bottom: 4px solid #6366F1;">
                    <span class="kpi-label" style="color: #4F46E5;">Inventaire Actif</span>
                    <span class="kpi-value"><?php echo e($produitsActifs); ?> / <?php echo e($totalProduits); ?></span>
                    <div class="kpi-trend" style="color: #EF4444;">
                        <?php echo e($produitsInactifs); ?> produits hors ligne
                    </div>
                </div>
            </div>

            <h4 style="margin: 30px 0 20px 0; font-weight: 700; color: var(--text-main);">Statistiques Globales</h4>
            <div class="kpi-grid" style="grid-template-columns: repeat(3, 1fr);">
                <!-- Total Produits -->
                <a href="<?php echo e(route('dashbord.vendeur.produits.index')); ?>" style="text-decoration: none;">
                    <div class="kpi-card" style="border-bottom: 4px solid #8B5CF6;">
                        <span class="kpi-label" style="color: #7C3AED;">Total Produits</span>
                        <span class="kpi-value"><?php echo e($totalProduits); ?></span>
                        <div class="kpi-trend">Gérer mon catalogue &rarr;</div>
                    </div>
                </a>

                <!-- Total Catégories -->
                <a href="<?php echo e(route('dashbord.vendeur.categories.index')); ?>" style="text-decoration: none;">
                    <div class="kpi-card" style="border-bottom: 4px solid #EC4899;">
                        <span class="kpi-label" style="color: #DB2777;">Total Catégories</span>
                        <span class="kpi-value"><?php echo e($totalCategories); ?></span>
                        <div class="kpi-trend">Organiser les rayons &rarr;</div>
                    </div>
                </a>

                <!-- Total Commandes -->
                <a href="<?php echo e(route('commandes.index')); ?>" style="text-decoration: none;">
                    <div class="kpi-card" style="border-bottom: 4px solid #64748B;">
                        <span class="kpi-label" style="color: #475569;">Total Commandes</span>
                        <span class="kpi-value"><?php echo e($volumeCommandes); ?></span>
                        <div class="kpi-trend">Consulter l'historique complet &rarr;</div>
                    </div>
                </a>
            </div>

            <h4 style="margin: 30px 0 20px 0; font-weight: 700; color: var(--text-main);">Suivi des Commandes</h4>
            <div class="kpi-grid" style="grid-template-columns: repeat(3, 1fr);">
                <!-- Acceptées -->
                <a href="<?php echo e(route('commandes.index', ['statut' => 'validee'])); ?>" style="text-decoration: none;">
                    <div class="kpi-card" style="border-bottom: 4px solid #10B981;">
                        <span class="kpi-label" style="color: #059669;">Commandes Acceptées</span>
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <span class="kpi-value"><?php echo e($commandesAcceptees); ?></span>
                            <span style="font-weight: 700; color: #059669; font-size: 0.9rem;"><?php echo e(number_format($montantAccepte, 0, ',', ' ')); ?> CFA</span>
                        </div>
                        <div class="kpi-trend">Volumes des ventes validées</div>
                    </div>
                </a>

                <!-- En attente -->
                <a href="<?php echo e(route('commandes.index', ['statut' => 'en_attente'])); ?>" style="text-decoration: none;">
                    <div class="kpi-card" style="border-bottom: 4px solid #F59E0B;">
                        <span class="kpi-label" style="color: #D97706;">Commandes en Attente</span>
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <span class="kpi-value"><?php echo e($commandesEnAttente); ?></span>
                            <span style="font-weight: 700; color: #D97706; font-size: 0.9rem;"><?php echo e(number_format($montantAttente, 0, ',', ' ')); ?> CFA</span>
                        </div>
                        <div class="kpi-trend">Valeur potentielle en attente</div>
                    </div>
                </a>

                <!-- Refusées/Annulées -->
                <a href="<?php echo e(route('commandes.index', ['statut' => 'annulee'])); ?>" style="text-decoration: none;">
                    <div class="kpi-card" style="border-bottom: 4px solid #EF4444;">
                        <span class="kpi-label" style="color: #DC2626;">Commandes Annulées</span>
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <span class="kpi-value"><?php echo e($commandesAnnulees); ?></span>
                            <span style="font-weight: 700; color: #DC2626; font-size: 0.9rem;"><?php echo e(number_format($montantAnnule, 0, ',', ' ')); ?> CFA</span>
                        </div>
                        <div class="kpi-trend">Perte sur commandes annulées</div>
                    </div>
                </a>
            </div>

            <!-- Charts (Placeholders for now, structure added) -->
            <!-- <div class="dashboard-panel" style="margin-bottom: 40px; padding: 30px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <h3 style="margin: 0; font-size: 1.2rem; font-weight: 800;">Évolution des Ventes</h3>
                    <select style="border: 1px solid var(--border); padding: 8px 15px; border-radius: 8px; font-size: 0.85rem;">
                        <option>6 derniers mois</option>
                    </select>
                </div>
                <div style="height: 300px; display: flex; align-items: flex-end; gap: 20px; padding-bottom: 20px;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ventesMensuelles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 10px;">
                        <div style="width: 100%; background: linear-gradient(to top, var(--primary), var(--secondary)); border-radius: 8px; height: <?php echo e(max(20, ($vente->total / ($chiffreAffairesTotal ?: 1)) * 300)); ?>px; transition: height 0.5s;"></div>
                        <span style="font-size: 0.75rem; font-weight: 700; color: var(--text-sub);"><?php echo e($vente->mois); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ventesMensuelles->isEmpty()): ?>
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--text-sub); font-style: italic; border: 2px dashed var(--border); border-radius: 12px;">
                            Aucune donnée de vente disponible pour cette période.
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div> -->

            <div class="main-grid">
                
                <!-- Recent Orders -->
                <div class="dashboard-panel">
                    <div class="panel-header">
                        <h3>Dernière Activité</h3>
                        <a href="<?php echo e(route('commandes.index')); ?>" class="action-link">Voir tout</a>
                    </div>
                    <div class="panel-content">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $commandesRecentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="font-weight: 600;"><?php echo e($cmd->user->nom); ?> <?php echo e($cmd->user->prenom); ?></td>
                                    <td style="color: var(--text-sub);"><?php echo e($cmd->created_at->format('d/m/Y')); ?></td>
                                    <td style="font-weight: 700;"><?php echo e(number_format($cmd->montant_total, 0, ',', ' ')); ?> CFA</td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cmd->statut === 'validee'): ?>
                                            <span class="status-badge" style="background: #D1FAE5; color: #065F46;">Validée</span>
                                        <?php else: ?>
                                            <span class="status-badge" style="background: #FEF3C7; color: #92400E;">En attente</span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="dashboard-panel">
                    <div class="panel-header">
                        <h3>Best Sellers</h3>
                        <span style="font-size: 0.75rem; background: #DBEAFE; color: #1E40AF; padding: 4px 10px; border-radius: 12px; font-weight: 700;">Top 5</span>
                    </div>
                    <div class="panel-content" style="padding: 20px;">
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 20px;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $topProduits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <p style="margin: 0; font-weight: 700; color: var(--text-main); font-size: 0.95rem;"><?php echo e($tp->nom); ?></p>
                                    <p style="margin: 3px 0 0 0; font-size: 0.8rem; color: var(--text-sub);"><?php echo e($tp->total_vendu); ?> unités vendues</p>
                                </div>
                                <span style="font-weight: 800; color: var(--primary);"><?php echo e(number_format($tp->total_revenu, 0, ',', ' ')); ?> CFA</span>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topProduits->isEmpty()): ?>
                                <p style="text-align: center; color: var(--text-sub); font-size: 0.85rem; padding: 20px;">Aucune vente enregistrée.</p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Categories Section (Minimal List) -->
            <div class="dashboard-panel" style="margin-top: 40px;">
                <div class="panel-header">
                    <h3>Performance par Catégorie</h3>
                </div>
                <div class="panel-content">
                    <div style="display: flex; flex-wrap: wrap; gap: 15px; padding: 25px;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('dashbord.vendeur.produits.index', ['categorie_id' => $cat->id])); ?>" style="flex: 1; min-width: 200px; text-decoration: none;">
                            <div style="background: #F9FAFB; padding: 15px 20px; border-radius: 12px; border: 1px solid var(--border); height: 100%;">
                                <p style="margin: 0; font-size: 0.75rem; color: var(--text-sub); font-weight: 700; text-transform: uppercase;"><?php echo e($cat->nom); ?></p>
                                <p style="margin: 8px 0 0 0; display: flex; justify-content: space-between; align-items: baseline;">
                                    <span style="font-size: 1.5rem; font-weight: 800; color: var(--text-main);"><?php echo e($cat->produits_count); ?></span>
                                    <span style="font-size: 0.8rem; color: var(--text-sub);">Produits</span>
                                </p>
                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>

        </div>            
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/dashbord/vendeur/analytics.blade.php ENDPATH**/ ?>