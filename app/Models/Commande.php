<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'numero_commande',
        'date_commande',
        'quantité',
        'montant_untaire',
        'montant_total',
        'user_id',
        'produit_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function produit()
    {
        return $this->hasMany(Produits::class);
    }
}
