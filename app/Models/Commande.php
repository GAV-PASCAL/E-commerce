<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'numero_fiche',
        'user_id',
        'vendeur_id',
        'date_commande',
        'montant_total',
        'statut',
        'reference_paiement',
    ];

    protected $casts = [
        'date_commande' => 'date',
        'montant_total' => 'decimal:2',
    ];

    /**
     * Relation avec le client
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec le vendeur
     */
    public function vendeur()
    {
        return $this->belongsTo(User::class, 'vendeur_id');
    }

    /**
     * Relation many-to-many avec les produits
     */
    public function produits()
    {
        return $this->belongsToMany(Produits::class, 'commande_produit', 'commande_id', 'produit_id')
            ->withPivot('quantite', 'prix_unitaire', 'prix_total')
            ->withTimestamps();
    }

    /**
     * Générer un numéro de fiche unique
     */
    public static function genererNumeroFiche()
    {
        $annee = date('Y');
        $derniereCommande = self::whereYear('created_at', $annee)
            ->orderBy('id', 'desc')
            ->first();

        if ($derniereCommande) {
            $dernierNumero = (int) substr($derniereCommande->numero_fiche, -4);
            $nouveauNumero = $dernierNumero + 1;
        } else {
            $nouveauNumero = 1;
        }

        return 'CMD-' . $annee . '-' . str_pad($nouveauNumero, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Calculer le montant total
     */
    public function calculerMontantTotal()
    {
        $total = 0;
        foreach ($this->produits as $produit) {
            $total += $produit->pivot->prix_total;
        }
        $this->montant_total = $total;
        $this->save();
        return $total;
    }
}
