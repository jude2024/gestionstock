<?php

namespace App\Http\Controllers\Web;

use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VenteController extends Controller
{
    public function index(Request $request)
    {
        $query = Vente::with('produit');

        // Filtre par produit
        if ($request->filled('produit_id')) {
            $query->where('produit_id', $request->produit_id);
        }

        // Filtre par catégorie
        if ($request->filled('categorie')) {
            $query->whereHas('produit', function ($q) use ($request) {
                $q->where('category', $request->categorie);
            });
        }

        // Filtre par date
        if ($request->filled('date_from')) {
            $query->whereDate('date_vente', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('date_vente', '<=', $request->date_to);
        }

        // Filtre sur stock
        if ($request->filled('stock_min')) {
            $query->whereHas('produit', function ($q) use ($request) {
                $q->where('quantity_in_stock', '>=', $request->stock_min);
            });
        }
        if ($request->filled('stock_max')) {
            $query->whereHas('produit', function ($q) use ($request) {
                $q->where('quantity_in_stock', '<=', $request->stock_max);
            });
        }

        // Récupère tous les produits et catégories pour le formulaire
        $produits = Produit::all();
        $categories = Produit::select('category')->distinct()->pluck('category');

        // Pagination
        $ventes = $query->orderBy('date_vente', 'desc')->paginate(10)->withQueryString();

        return view('ventes.index', compact('ventes', 'produits', 'categories'));
    }


    public function create(Request $request)
    {
        // Récupération de la recherche et du filtre
        $searchProduit = $request->input('search_produit');
        $categorie     = $request->input('categorie');

        // On démarre la requête sur les produits
        $query = Produit::query();

        // Filtrer par nom de produit si recherche présente
        if ($searchProduit) {
            $query->where('name', 'like', '%' . $searchProduit . '%');
        }

        // Filtrer par catégorie si sélectionnée
        if ($categorie) {
            $query->where('category', $categorie);
        }

        // Récupération des produits filtrés
        $produits = $query->get();

        // Récupérer toutes les catégories pour le select du filtre
        $categories = Produit::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        return view('ventes.create', compact('produits', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite_vendue' => 'required|integer|min:1',
            'prix_vente_unitaire' => 'required|numeric',
            'date_vente' => 'required|date',
        ]);

        $data = $request->all();
        // produit 




        $data['valeur_totale'] = $data['quantite_vendue'] * $data['prix_vente_unitaire'];
        $vente = Vente::create($data);
        $vente->produit->decrement('quantity_in_stock', $data['quantite_vendue']);


        return redirect()->route('ventes.index')->with('success', 'Vente enregistrée.');
    }

    public function show(Vente $vente)
    {
        return view('ventes.show', compact('vente'));
    }

    public function edit(Vente $vente)
    {
        $produits = Produit::all();
        return view('ventes.edit', compact('vente', 'produits'));
    }

    public function update(Request $request, Vente $vente)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite_vendue' => 'required|integer|min:1',
            'prix_vente_unitaire' => 'required|numeric',
            'date_vente' => 'required|date',
        ]);

        $data = $request->all();
        $data['valeur_totale'] = $data['quantite_vendue'] * $data['prix_vente_unitaire'];

        $vente->update($data);

        return redirect()->route('ventes.index')->with('success', 'Vente mise à jour.');
    }

    public function destroy(Vente $vente)
    {
        $vente->delete();
        return redirect()->route('ventes.index')->with('success', 'Vente supprimée.');
    }

    public function recap(Request $request)
    {
        $query = Vente::with('produit');

        // Si aucun filtre n'est appliqué, on prend par défaut la date du jour
        if (!$request->filled('date') && !$request->filled('date_start') && !$request->filled('date_end')) {
            $query->whereDate('date_vente', now());
        }

        // Filtre par date exacte
        if ($request->filled('date')) {
            $query->whereDate('date_vente', $request->date);
        }

        // Filtre par date début (tout ce qui est >= date_start)
        if ($request->filled('date_start')) {
            $query->whereDate('date_vente', '>=', $request->date_start);
        }

        // Filtre par date fin (tout ce qui est <= date_end)
        if ($request->filled('date_end')) {
            $query->whereDate('date_vente', '<=', $request->date_end);
        }

        // Pagination
        $ventes = $query->orderBy('date_vente', 'desc')->paginate(10)->withQueryString();

        // Total des ventes sur la période filtrée
        $total_ventes = $query->sum(DB::raw('quantite_vendue * prix_vente_unitaire'));

        return view('ventes.recap', compact('ventes', 'total_ventes'));
    }
}
