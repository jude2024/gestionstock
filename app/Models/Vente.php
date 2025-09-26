<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $fillable = [
        'produit_id',
        'quantite_vendue',
        'prix_vente_unitaire',
        'valeur_totale',
        'date_vente',
    ];

    // Convertit date_vente en Carbon automatiquement
    protected $casts = [
        'date_vente' => 'datetime',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
