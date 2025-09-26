<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;

class Reapprovisionnement extends Model
{
    protected $fillable = [
        'produit_id',
        'quantity',
        'prix_achat_unitaire',
        'valeur_totale',
        'date_reapprovisionnement',
    ];

    protected $casts = [
        'date_reapprovisionnement' => 'datetime',
    ];

    // Relationships can be defined here if needed
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
