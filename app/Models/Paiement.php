<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'date_paiement',
        'mode_paiement',
        'montant',
        'transaction_id',
        'commande_id',
    ];

    public function commande()
    {
        return $this->hasOne(Commande::class);
    }
}
