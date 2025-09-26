<?php

namespace App\Http\Controllers\Web;

use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Reapprovisionnement;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $stockTotal = Produit::sum('quantity_in_stock');

        $valeurStock = Produit::select(DB::raw('SUM(quantity_in_stock * unit_price) as total'))->pluck('total')->first();


        $ventesDuJour = Vente::whereDate('date_vente', $today)->sum('valeur_totale');
        $beneficeDuJour = Vente::whereDate('date_vente', $today)
            ->get()
            ->sum(function ($v) {
                return $v->valeur_totale - ($v->quantite_vendue * $v->produit->unit_price);
            });


        $dernieresVentes = Vente::latest()->take(5)->get();
        $dernieresReappro = Reapprovisionnement::latest()->take(5)->get();

        return view('dashboard', compact(
            'stockTotal',
            'valeurStock',
            'ventesDuJour',
            'beneficeDuJour',
            'dernieresVentes',
            'dernieresReappro'
        ));
    }
}
