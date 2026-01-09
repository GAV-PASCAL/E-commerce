<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de Commande {{ $commande->numero_fiche }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Nunitos Sans', Arial, sans-serif;
            font-size: 12px;
            color: #000000ff;
            line-height: 1.6;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #B45309;
            padding-bottom: 15px;
        }
        
        .header h1 {
            color: #B45309;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .header p {
            color: #000000ff;
            font-size: 14px;
        }

        #cmd_fiche{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        
        .info-section {
            margin-bottom: 25px;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
        
        .info-section h2 {
            color: #B45309;
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 2px solid #92400E;
            padding-bottom: 5px;
        }
        
        .info-grid {
            display: table;
            width: 100%;
            margin-top: 10px;
        }
        
        .info-row {
            display: table-row;
        }
        
        .info-label {
            display: table-cell;
            font-weight: bold;
            padding: 5px 10px 5px 0;
            width: 40%;
        }
        
        .info-value {
            display: table-cell;
            padding: 5px 0;
        }
        
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .products-table thead {
            background: #92400E;
            color: white;
        }
        
        .products-table th,
        .products-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        .products-table th {
            font-weight: bold;
        }
        
        .products-table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }
        
        .products-table tfoot {
            background: #e9ecef;
            font-weight: bold;
        }
        
        .products-table tfoot td {
            padding: 12px 10px;
            font-size: 14px;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 3px;
            font-weight: bold;
            font-size: 11px;
        }
        
        .status-en-attente {
            background: #ffc107;
            color: #000;
        }
        
        .status-validee {
            background: #28a745;
            color: #fff;
        }
        
        .status-annulee {
            background: #dc3545;
            color: #fff;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 2px solid #ddd;
            text-align: center;
            color: #000000ff;
            font-size: 10px;
        }
        
        .total-amount {
            font-size: 16px;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="header" id='cmd_fiche'>
        <div >
            <h1>FICHE DE COMMANDE DE EASYORDER</h1>
            <p>{{ $commande->numero_fiche }}</p>
        </div>
        <div>
            
        </div>
    </div>

    <div class="info-section">
        <h2>Informations de la commande</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Numéro de fiche :</div>
                <div class="info-value">{{ $commande->numero_fiche }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Date de commande :</div>
                <div class="info-value">{{ $commande->date_commande->format('d/m/Y') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Date d'émission :</div>
                <div class="info-value">{{ $commande->created_at->format('d/m/Y à H:i') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Statut :</div>
                <div class="info-value">
                    @if($commande->statut === 'en_attente')
                        <span class="status-badge status-en-attente">EN ATTENTE</span>
                    @elseif($commande->statut === 'validee')
                        <span class="status-badge status-validee">VALIDÉE</span>
                    @else
                        <span class="status-badge status-annulee">ANNULÉE</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="info-section">
        <h2>Informations du client</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Nom complet :</div>
                <div class="info-value">{{ $commande->user->nom }} {{ $commande->user->prenom }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Email :</div>
                <div class="info-value">{{ $commande->user->email }}</div>
            </div>
        </div>
    </div>

    <div class="info-section">
        <h2>Produits commandés</h2>
        <table class="products-table">
            <thead>
                <tr>
                    <th style="width: 40%;">Produit</th>
                    <th style="width: 20%;" class="text-right">Prix Unitaire</th>
                    <th style="width: 15%;" class="text-center">Quantité</th>
                    <th style="width: 25%;" class="text-right">Prix Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commande->produits as $produit)
                    <tr>
                        <td>{{ $produit->nom }}</td>
                        <td class="text-right">{{ number_format($produit->pivot->prix_unitaire, 0, ',', ' ') }} FCFA</td>
                        <td class="text-center">{{ $produit->pivot->quantite }}</td>
                        <td class="text-right">{{ number_format($produit->pivot->prix_total, 0, ',', ' ') }} FCFA</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right">MONTANT TOTAL :</td>
                    <td class="text-right total-amount">{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</td>
                </tr>
            </tfoot>
        </table>
    </div>

    @if($commande->statut === 'validee')
        <div class="info-section">
            <h2>Validation</h2>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Validée le :</div>
                    <div class="info-value">{{ $commande->updated_at->format('d/m/Y à H:i') }}</div>
                </div>
            </div>
        </div>
    @endif

    <div class="footer">
        <p>Document généré le {{ now()->format('d/m/Y à H:i') }}</p>
        <p>Ce document est une fiche de commande officielle.</p>
    </div>
</body>
</html>
