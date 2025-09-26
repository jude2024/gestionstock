<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;

class Avarie extends Model
{
    protected $fillable = [
        'produit_id',
        'quantite_avariee',
        'raison',
        'montant',
        'date_avarie',
    ];

    // Relationships can be defined here if needed
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
