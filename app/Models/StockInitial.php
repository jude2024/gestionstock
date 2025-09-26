<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;

class StockInitial extends Model
{
    protected $fillable = [
        'produit_id',
        'quantity',
        'prix_achat_unitaire',
        'valeur_totale',
    ];

    // Relationships can be defined here if needed
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    

}
