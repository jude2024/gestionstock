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
    /**
     * Tableau de bord résumé des produits et finances
     */
    public function index(Request $request)
    {
        // ---------------------------
        // Filtrage des produits
        // ---------------------------
        $query = Produit::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('categorie')) {
            $query->where('category', $request->categorie);
        }

        $produits = $query->orderBy('name')->paginate(10)->withQueryString();
        $categories = Produit::select('category')->distinct()->pluck('category');

        // ---------------------------
        // Statistiques globales
        // ---------------------------
        // Total ventes : somme de quantite * prix unitaire
        $total_ventes = Vente::sum(DB::raw('quantite_vendue * prix_vente_unitaire'));

        // Total dépenses et avaries
        $total_depenses = Depense::sum('montant');
        $total_avaries = Avarie::sum('montant');

        // Bénéfice brut
        $benefice_brut = $total_ventes - $total_depenses - $total_avaries;

        // ---------------------------
        // Valeur des produits en stock
        // ---------------------------
        $inventaire = $produits->map(function ($produit) {
            $stock_actuel = $produit->quantity_in_stock ?? 0;

            // Utiliser prix unitaire d'achat pour valeur d'achat et prix de vente pour valeur de vente
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

    /**
     * Récapitulatif des ventes avec filtres par date
     */
    public function recap(Request $request)
    {
        $query = Vente::with('produit');

        // Filtre par date unique
        if ($request->filled('date')) {
            $query->whereDate('date_vente', $request->date);
        }

        // Filtre par intervalle de dates
        if ($request->filled('date_start') && $request->filled('date_end')) {
            $query->whereBetween('date_vente', [$request->date_start, $request->date_end]);
        }

        // Cloner la requête pour le total avant pagination
        $total_ventes = (clone $query)->sum(DB::raw('quantite_vendue * prix_vente_unitaire'));

        // Pagination
        $ventes = $query->orderBy('date_vente', 'desc')->paginate(10)->withQueryString();

        return view('ventes.recap', compact('ventes', 'total_ventes'));
    }
}
