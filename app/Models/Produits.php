<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'qte_min',
        'image',
        'categorie_id',
        'urlimg_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    } 
    
    public function urlimg()
    {
        return $this->belongsTo(Urlimg::class, 'urlimg_id');
    }
}
