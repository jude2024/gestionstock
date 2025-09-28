<?php

namespace App\Models;

use App\Models\Vente;
use App\Models\Avarie;
use App\Models\Reapprovisionnement;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'name',
        'reference',
        'category',
        'quantity_in_stock',
        'description',
        'unit_price',
        'seller_price',
        'lot_price',
        'units_per_lot',
        'alert_seuil',
        'image_path',
    ];


    public function reapprovisionnements()
    {
        return $this->hasMany(Reapprovisionnement::class);
    }
    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
    public function avaries()
    {
        return $this->hasMany(Avarie::class);
    }
}
