<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de Commande #<?php echo e($commande->numero_commande); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #B45309;
        }

        .header h1 {
            color: #B45309;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        .info-section {
            margin-bottom: 25px;
        }

        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .info-col {
            display: table-cell;
            width: 50%;
            padding: 15px;
            vertical-align: top;
        }

        .info-col.left {
            background: #FEF3C7;
            border-radius: 8px 0 0 8px;
        }

        .info-col.right {
            background: #F3F4F6;
            border-radius: 0 8px 8px 0;
        }

        .info-col h3 {
            color: #B45309;
            font-size: 14px;
            margin-bottom: 10px;
            border-bottom: 2px solid #92400E;
            padding-bottom: 5px;
        }

        .info-col p {
            margin: 5px 0;
            font-size: 11px;
        }

        .info-col strong {
            color: #92400E;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .products-table thead {
            background: #B45309;
            color: white;
        }

        .products-table th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
        }

        .products-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #E5E7EB;
        }

        .products-table tbody tr:nth-child(even) {
            background: #F9FAFB;
        }

        .products-table tfoot {
            background: #FEF3C7;
            font-weight: bold;
        }

        .products-table tfoot td {
            padding: 15px 12px;
            font-size: 14px;
            border-top: 2px solid #B45309;
        }

        .payment-info {
            background: #FEF3C7;
            border: 2px solid #B45309;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
        }

        .payment-info h3 {
            color: #92400E;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .payment-info .highlight {
            background: white;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            font-size: 14px;
        }

        .payment-info .highlight strong {
            color: #B45309;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 11px;
        }

        .status-en_attente {
            background: #FEF3C7;
            color: #92400E;
        }

        .status-confirmee {
            background: #D1FAE5;
            color: #065F46;
        }

        .status-en_preparation {
            background: #BFDBFE;
            color: #1E40AF;
        }

        .status-expediee {
            background: #E0E7FF;
            color: #3730A3;
        }

        .status-livree {
            background: #DCFCE7;
            color: #15803D;
        }

        .status-annulee {
            background: #FEE2E2;
            color: #991B1B;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #E5E7EB;
            text-align: center;
            color: #666;
            font-size: 10px;
        }

        .text-right {
            text-align: right;
        }

        code {
            background: #F3F4F6;
            padding: 3px 8px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <!-- En-tête -->
    <div class="header">
        <h1>FICHE DE COMMANDE</h1>
        <p>N° <?php echo e($commande->numero_commande); ?></p>
        <p>Date: <?php echo e($commande->date_commande->format('d/m/Y à H:i')); ?></p>
    </div>

    <!-- Informations -->
    <div class="info-grid">
        <div class="info-col left">
            <h3>INFORMATIONS COMMANDE</h3>
            <p><strong>Numéro:</strong> <?php echo e($commande->numero_commande); ?></p>
            <p><strong>Date:</strong> <?php echo e($commande->date_commande->format('d/m/Y')); ?></p>
            <p><strong>Référence paiement:</strong> <code><?php echo e($commande->reference_paiement); ?></code></p>
            <p>
                <strong>Statut:</strong> 
                <span class="status-badge status-<?php echo e($commande->statut); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($commande->statut === 'en_attente'): ?>
                        EN ATTENTE
                    <?php elseif($commande->statut === 'confirmee'): ?>
                        CONFIRMÉE
                    <?php elseif($commande->statut === 'en_preparation'): ?>
                        EN PRÉPARATION
                    <?php elseif($commande->statut === 'expediee'): ?>
                        EXPÉDIÉE
                    <?php elseif($commande->statut === 'livree'): ?>
                        LIVRÉE
                    <?php elseif($commande->statut === 'annulee'): ?>
                        ANNULÉE
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
            </p>
        </div>
        <div class="info-col right">
            <h3>INFORMATIONS CLIENT</h3>
            <p><strong>Nom:</strong> <?php echo e($commande->user->nom); ?></p>
            <p><strong>Prénom:</strong> <?php echo e($commande->user->prenom); ?></p>
            <p><strong>Email:</strong> <?php echo e($commande->user->email); ?></p>
        </div>
    </div>

    <!-- Produits -->
    <h3 style="color: #B45309; margin-bottom: 10px; font-size: 16px;">PRODUITS COMMANDÉS</h3>
    <table class="products-table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $commande->produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($produit->nom); ?></td>
                <td><?php echo e(number_format($produit->pivot->prix_unitaire, 0, ',', ' ')); ?> FCFA</td>
                <td><?php echo e($produit->pivot->quantite); ?></td>
                <td class="text-right"><strong><?php echo e(number_format($produit->pivot->prix_total, 0, ',', ' ')); ?> FCFA</strong></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right">MONTANT TOTAL:</td>
                <td class="text-right" style="font-size: 16px; color: #92400E;"><?php echo e(number_format($commande->montant_total, 0, ',', ' ')); ?> FCFA</td>
            </tr>
        </tfoot>
    </table>

    <!-- Informations de paiement -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($commande->statut === 'en_attente'): ?>
    <div class="payment-info">
        <h3>INFORMATIONS DE PAIEMENT</h3>
        <div class="highlight">
            <p><strong>ID de commande:</strong> <?php echo e($commande->numero_commande); ?></p>
        </div>
        <div class="highlight">
            <p><strong>Référence unique:</strong> <?php echo e($commande->reference_paiement); ?></p>
        </div>
        <div class="highlight">
            <p><strong>Montant à payer:</strong> <?php echo e(number_format($commande->montant_total, 0, ',', ' ')); ?> FCFA</p>
        </div>
        <p style="margin-top: 15px; font-style: italic; color: #92400E; font-size: 11px;">
            Veuillez utiliser ces informations lors du paiement pour que votre commande soit automatiquement validée.
        </p>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Pied de page -->
    <div class="footer">
        <p>Document généré le <?php echo e(now()->format('d/m/Y à H:i')); ?></p>
        <p>EasyOrder - Plateforme de vente en ligne</p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\pasca\Documents\fast\poto\resources\views/pdf/commande.blade.php ENDPATH**/ ?>