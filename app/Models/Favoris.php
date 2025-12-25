<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    protected $fillable = [
        'user_id',
        'produit_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
        
    }

    public function produit()
    {
        return $this->hasMany(Produits::class);

    }
}
