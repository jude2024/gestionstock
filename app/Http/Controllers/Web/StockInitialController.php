<?php

namespace App\Http\Controllers\Web;

use App\Models\Produit;
use App\Models\StockInitial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockInitialController extends Controller
{
    /**
     * Liste des stocks initiaux
     */
    public function index(Request $request)
    {
        // Récupérer les catégories disponibles
        $categories = Produit::select('category')->distinct()->pluck('category')->filter();

        $query = StockInitial::with('produit');

        // Filtre par nom de produit
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('produit', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // Filtre par catégorie
        if ($request->filled('categorie')) {
            $query->whereHas('produit', function ($q) use ($request) {
                $q->where('category', $request->input('categorie'));
            });
        }

        // Filtre par quantité min/max
        if ($request->filled('quantity_min')) {
            $query->where('quantity', '>=', $request->input('quantity_min'));
        }
        if ($request->filled('quantity_max')) {
            $query->where('quantity', '<=', $request->input('quantity_max'));
        }

        // Filtre par valeur totale min/max
        if ($request->filled('valeur_min')) {
            $query->where('valeur_totale', '>=', $request->input('valeur_min'));
        }
        if ($request->filled('valeur_max')) {
            $query->where('valeur_totale', '<=', $request->input('valeur_max'));
        }

        $stocks = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('stock_initials.index', compact('stocks', 'categories'));
    }


    /**
     * Formulaire de création
     */
    public function create(Request $request)
    {
        // Récupérer toutes les catégories distinctes
        $categories = Produit::distinct()->pluck('category')->filter()->toArray();

        // Filtrer les produits selon la recherche ou la catégorie
        $produitsQuery = Produit::query();

        if ($request->filled('search')) {
            $produitsQuery->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('categorie')) {
            $produitsQuery->where('category', $request->categorie);
        }

        $produits = $produitsQuery->orderBy('name')->get();

        return view('stock_initials.create', compact('produits', 'categories'));
    }



    /**
     * Enregistrement d’un nouveau stock initial
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id'          => 'required|exists:produits,id',
            'quantity'            => 'required|integer|min:0',
            'prix_achat_unitaire' => 'nullable|numeric|min:0',
        ], [
            'produit_id.required' => 'Le produit est obligatoire.',
            'produit_id.exists'   => 'Le produit sélectionné est invalide.',
            'quantity.required'   => 'La quantité est obligatoire.',
            'quantity.integer'    => 'La quantité doit être un nombre entier.',
            'quantity.min'        => 'La quantité doit être au moins 0.',
            'prix_achat_unitaire.numeric' => 'Le prix unitaire doit être un nombre.',
            'prix_achat_unitaire.min'     => 'Le prix unitaire doit être positif.',
        ]);
        $data = $request->only('produit_id', 'quantity', 'prix_achat_unitaire');

        // Calcul automatique de la valeur totale
        $data['valeur_totale'] = $data['quantity'] * $data['prix_achat_unitaire'];

        StockInitial::create($data);

        return redirect()->route('stock_initials.index')
            ->with('success', 'Stock initial ajouté avec succès.');
    }

    /**
     * Affichage d’un stock initial
     */
    public function show(StockInitial $stockInitial)
    {
        return view('stock_initials.show', compact('stockInitial'));
    }

    /**
     * Formulaire d’édition
     */
    public function edit(StockInitial $stockInitial)
    {
        $produits = Produit::all();
        return view('stock_initials.edit', compact('stockInitial', 'produits'));
    }

    /**
     * Mise à jour d’un stock initial
     */
    public function update(Request $request, StockInitial $stockInitial)
    {
        $request->validate([
            'produit_id'          => 'required|exists:produits,id',
            'quantity'            => 'required|integer|min:0',
            'prix_achat_unitaire' => 'nullable|numeric|min:0',
        ], [
            'produit_id.required' => 'Le produit est obligatoire.',
            'produit_id.exists'   => 'Le produit sélectionné est invalide.',
            'quantity.required'   => 'La quantité est obligatoire.',
            'quantity.integer'    => 'La quantité doit être un nombre entier.',
            'quantity.min'        => 'La quantité doit être au moins 0.',
            'prix_achat_unitaire.numeric' => 'Le prix unitaire doit être un nombre.',
            'prix_achat_unitaire.min'     => 'Le prix unitaire doit être positif.',

        ]);

        $data = $request->only('produit_id', 'quantity', 'prix_achat_unitaire');

        // Recalcul automatique de la valeur totale
        $data['valeur_totale'] = $data['quantity'] * $data['prix_achat_unitaire'];

        $stockInitial->update($data);
        return redirect()->route('stock_initials.index')
            ->with('success', 'Stock initial mis à jour avec succès.');
    }

    /**
     * Suppression d’un stock initial
     */
    public function destroy(StockInitial $stockInitial)
    {
        $stockInitial->delete();

        return redirect()->route('stock_initials.index')
            ->with('success', 'Stock initial supprimé avec succès.');
    }
}
