<?php

namespace App\Http\Controllers\Web;

use App\Models\Avarie;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvarieController extends Controller
{
    /**
     * Liste des avaries avec filtres et pagination
     */
    public function index(Request $request)
    {
        $query = Avarie::with('produit');

        // Filtre par produit
        if ($request->filled('produit_id')) {
            $query->where('produit_id', $request->produit_id);
        }

        // Filtre par date
        if ($request->filled('date_from')) {
            $query->whereDate('date_avarie', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('date_avarie', '<=', $request->date_to);
        }

        if ($request->filled('categorie')) {
            $query->whereHas('produit', function ($q) use ($request) {
                $q->where('category', $request->categorie);
            });
        }

        // Pagination
        $avaries = $query->orderBy('date_avarie', 'desc')->paginate(10)->withQueryString();
        $categories = Produit::distinct()->pluck('category')->filter()->all();

        // Liste des produits pour le filtre
        $produits = Produit::orderBy('name')->get();

        return view('avaries.index', compact('avaries', 'categories', 'produits'));
    }

    /**
     * Formulaire de création
     */
    public function create(Request $request)
    {
        $query = Produit::query();

        // Filtre par recherche de nom
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filtre par catégorie
        if ($request->filled('categorie')) {
            $query->where('category', $request->categorie);
        }

        $produits = $query->orderBy('name')->get();

        // Récupérer toutes les catégories pour le select filter
        $categories = Produit::select('category')
            ->distinct()
            ->pluck('category');

        return view('avaries.create', compact('produits', 'categories'));
    }

    // show
    public function show(Avarie $avarie)
    {
        $avarie->load('produit'); // Charger le produit lié
        return view('avaries.show', compact('avarie'));
    }


    /**
     * Stockage d'une avarie
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite_avariee' => 'required|integer|min:1',
            'raison' => 'nullable|string|max:255',
            'date_avarie' => 'required|date',
        ]);

        $produit = Produit::findOrFail($request->produit_id);

        $requestData = $request->all();
        $requestData['montant'] = $request->quantite_avariee * ($produit->unit_price ?? 0);

        // Créer l'avarie
        Avarie::create($requestData);

        // Mettre à jour le stock du produit
       /* $produit->quantity_in_stock -= $request->quantite_avariee;
        $produit->save();*/

        return redirect()->route('avaries.index')
            ->with('success', 'Avarie enregistrée et stock mis à jour.');
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Avarie $avarie)
    {
        $produits = Produit::orderBy('name')->get();
        return view('avaries.edit', compact('avarie', 'produits'));
    }

    /**
     * Mise à jour d'une avarie
     */
    public function update(Request $request, Avarie $avarie)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite_avariee' => 'required|integer|min:1',
            'raison' => 'nullable|string|max:255',
            'date_avarie' => 'required|date',
        ]);

        $ancienProduit = $avarie->produit;
        $nouveauProduit = Produit::findOrFail($request->produit_id);

        // Revenir sur l'ancien stock
        $ancienProduit->quantity_in_stock += $avarie->quantite_avariee;
        $ancienProduit->save();

        // Calculer le montant
        $requestData = $request->all();
        $requestData['montant'] = $request->quantite_avariee * ($nouveauProduit->unit_price ?? 0);

        $avarie->update($requestData);

        // Mettre à jour le stock du nouveau produit
        $nouveauProduit->quantity_in_stock -= $request->quantite_avariee;
        $nouveauProduit->save();

        return redirect()->route('avaries.index')
            ->with('success', 'Avarie mise à jour et stock ajusté.');
    }

    /**
     * Supprimer une avarie
     */
    public function destroy(Avarie $avarie)
    {
        $produit = $avarie->produit;

        // Restituer la quantité au stock
        $produit->quantity_in_stock += $avarie->quantite_avariee;
        $produit->save();

        $avarie->delete();

        return redirect()->route('avaries.index')
            ->with('success', 'Avarie supprimée et stock ajusté.');
    }
}
