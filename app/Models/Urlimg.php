<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urlimg extends Model
{
    protected $fillable = [
        'url',
        'produit_id',
    ];

    public function produit()
    {
        return $this->hasOne(Produits::class);
    }
}
