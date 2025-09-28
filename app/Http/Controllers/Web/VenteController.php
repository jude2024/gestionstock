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

        if ($request->filled('produit_id')) {
            $query->where('produit_id', $request->produit_id);
        }

        if ($request->filled('categorie')) {
            $query->whereHas('produit', fn($q) => $q->where('category', $request->categorie));
        }

        if ($request->filled('date_from')) {
            $query->whereDate('date_vente', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('date_vente', '<=', $request->date_to);
        }

        $produits = Produit::all();
        $categories = Produit::select('category')->distinct()->pluck('category');

        $ventes = $query->orderBy('date_vente', 'desc')->paginate(10)->withQueryString();

        return view('ventes.index', compact('ventes', 'produits', 'categories'));
    }

    public function create(Request $request)
    {
        $query = Produit::query();

        if ($request->filled('search_produit')) {
            $query->where('name', 'like', '%' . $request->search_produit . '%');
        }

        if ($request->filled('categorie')) {
            $query->where('category', $request->categorie);
        }

        $produits = $query->get();
        $categories = Produit::select('category')->distinct()->whereNotNull('category')->pluck('category');

        return view('ventes.create', compact('produits', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite_vendue' => 'required|integer|min:1',
            'prix_vente_unitaire' => 'required|numeric|min:0',
            'type_vente' => 'required|in:unite,lot',
            'date_vente' => 'required|date',
        ]);

        $produit = Produit::findOrFail($request->produit_id);

        $quantite_stock_reelle = $request->quantite_vendue;
        if ($request->type_vente === 'lot') {
            // Si vente par lot, retirer le nombre d’unités correspondant
            $quantite_stock_reelle = $request->quantite_vendue * $produit->units_per_lot;
        }

        $valeur_totale = $request->quantite_vendue * $request->prix_vente_unitaire;

        $vente = Vente::create([
            'produit_id' => $request->produit_id,
            'quantite_vendue' => $request->quantite_vendue,
            'type_vente' => $request->type_vente,
            'prix_vente_unitaire' => $request->prix_vente_unitaire,
            'valeur_totale' => $valeur_totale,
            'date_vente' => $request->date_vente,
        ]);

        // Décrémenter le stock
        $produit->decrement('quantity_in_stock', $quantite_stock_reelle);

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
            'prix_vente_unitaire' => 'required|numeric|min:0',
            'type_vente' => 'required|in:unite,lot',
            'date_vente' => 'required|date',
        ]);

        $produit = Produit::findOrFail($request->produit_id);

        // Calculer la quantité réelle pour le stock
        $ancienne_quantite = $vente->type_vente === 'lot' ? $vente->quantite_vendue * $vente->produit->units_per_lot : $vente->quantite_vendue;
        $nouvelle_quantite = $request->type_vente === 'lot' ? $request->quantite_vendue * $produit->units_per_lot : $request->quantite_vendue;

        // Ajuster le stock
        $produit->increment('quantity_in_stock', $ancienne_quantite); // remettre l’ancienne quantité
        $produit->decrement('quantity_in_stock', $nouvelle_quantite); // retirer la nouvelle

        $vente->update([
            'produit_id' => $request->produit_id,
            'quantite_vendue' => $request->quantite_vendue,
            'type_vente' => $request->type_vente,
            'prix_vente_unitaire' => $request->prix_vente_unitaire,
            'valeur_totale' => $request->quantite_vendue * $request->prix_vente_unitaire,
            'date_vente' => $request->date_vente,
        ]);

        return redirect()->route('ventes.index')->with('success', 'Vente mise à jour.');
    }

    public function destroy(Vente $vente)
    {
        $quantite_stock_reelle = $vente->type_vente === 'lot' ? $vente->quantite_vendue * $vente->produit->units_per_lot : $vente->quantite_vendue;

        // Remettre le stock
        $vente->produit->increment('quantity_in_stock', $quantite_stock_reelle);

        $vente->delete();

        return redirect()->route('ventes.index')->with('success', 'Vente supprimée.');
    }

    public function recap(Request $request)
    {
        // On démarre la requête avec le produit lié
        $query = Vente::with('produit');

        // Si aucun filtre de date n'est fourni, on prend par défaut la date du jour
        if (!$request->filled('date') && !$request->filled('date_start') && !$request->filled('date_end')) {
            $query->whereDate('date_vente', now());
        }

        // Filtre par date exacte
        if ($request->filled('date')) {
            $query->whereDate('date_vente', $request->date);
        }

        // Filtre par date début
        if ($request->filled('date_start')) {
            $query->whereDate('date_vente', '>=', $request->date_start);
        }

        // Filtre par date fin
        if ($request->filled('date_end')) {
            $query->whereDate('date_vente', '<=', $request->date_end);
        }

        // Récupération paginée pour affichage
        $ventes = $query->orderBy('date_vente', 'desc')->paginate(10)->withQueryString();

        // Calcul du total des ventes (hors pagination)
        $total_ventes = (clone $query)->sum('valeur_totale');

        return view('ventes.recap', compact('ventes', 'total_ventes'));
    }
}
