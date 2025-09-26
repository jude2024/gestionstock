<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Vente;
use App\Models\Avarie;
use App\Models\Depense;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reapprovisionnement;
use App\Http\Controllers\Controller;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $today = \Carbon\Carbon::today();
        $startOfMonth = \Carbon\Carbon::now()->startOfMonth();
        $endOfMonth = \Carbon\Carbon::now()->endOfMonth();
        $startOfYear = \Carbon\Carbon::now()->startOfYear();
        $endOfYear = \Carbon\Carbon::now()->endOfYear();

        // ---------------------------
        // Inventaire produits avec filtre
        // ---------------------------
        $query = Produit::query();

        // Recherche par nom
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filtre par catégorie
        if ($request->filled('categorie')) {
            $query->where('category', $request->categorie);
        }

        // Pagination
        $produits = $query->orderBy('name')->paginate(10)->withQueryString();

        // Récupérer toutes les catégories pour le filtre
        $categories = Produit::select('category')->distinct()->pluck('category');

        // ---------------------------
        // Statistiques globales
        // ---------------------------
        $total_ventes = \App\Models\Vente::sum(DB::raw('quantite_vendue * prix_vente_unitaire'));
        $total_depenses = \App\Models\Depense::sum('montant');
        $total_avaries = \App\Models\Avarie::sum('montant');
        $benefice_brut = $total_ventes - $total_depenses - $total_avaries;

        // ---------------------------
        // Valeur des produits
        // ---------------------------
        $inventaire = $produits->map(function ($produit) {
            $stock_actuel = $produit->quantity_in_stock;
            $valeur_achat = $stock_actuel * ($produit->unit_price ?? 0);
            $valeur_vente = $stock_actuel * ($produit->seller_price ?? 0);
            return [
                'produit' => $produit,
                'stock_actuel' => $stock_actuel,
                'valeur_achat' => $valeur_achat,
                'valeur_vente' => $valeur_vente,
            ];
        });

        return view('resume.index', compact(
            'produits',
            'inventaire',
            'categories',
            'total_ventes',
            'total_depenses',
            'total_avaries',
            'benefice_brut'
        ));
    }

    public function recap(Request $request)
    {
        $query = \App\Models\Vente::with('produit');

        // Filtre par date unique
        if ($request->filled('date')) {
            $query->whereDate('date_vente', $request->date);
        }

        // Filtre par intervalle de dates
        if ($request->filled('date_start') && $request->filled('date_end')) {
            $query->whereBetween('date_vente', [$request->date_start, $request->date_end]);
        }

        // Pagination
        $ventes = $query->orderBy('date_vente', 'desc')->paginate(10)->withQueryString();

        // Total des ventes sur la période
        $total_ventes = $query->sum(DB::raw('quantite_vendue * prix_vente_unitaire'));

        return view('ventes.recap', compact('ventes', 'total_ventes'));
    }
}
