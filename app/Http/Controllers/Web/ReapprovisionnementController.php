<?php

namespace App\Http\Controllers\Web;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Reapprovisionnement;
use App\Http\Controllers\Controller;

class ReapprovisionnementController extends Controller
{
    /**
     * Liste des réapprovisionnements avec filtres et pagination
     */
    public function index(Request $request)
    {
        $query = Reapprovisionnement::with('produit');

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

        // Filtre par date de réapprovisionnement
        if ($request->filled('date_from')) {
            $query->where('date_reapprovisionnement', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('date_reapprovisionnement', '<=', $request->date_to);
        }

        $reapprovisionnements = $query->orderBy('date_reapprovisionnement', 'desc')->paginate(10);

        $produits = Produit::orderBy('name')->get();
        $categories = Produit::distinct()->pluck('category')->filter()->toArray();

        return view('reapprovisionnements.index', compact('reapprovisionnements', 'produits', 'categories'));
    }

    /**
     * Formulaire de création
     */
    public function create(Request $request)
    {
        // On récupère les paramètres de filtre depuis la requête
        $search = $request->input('search');       // recherche par nom
        $categorie = $request->input('categorie'); // filtre par catégorie

        // Construction de la requête avec filtres
        $query = Produit::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($categorie) {
            $query->where('category', $categorie);
        }

        $produits = $query->orderBy('name')->get();

        // Récupération unique des catégories pour le filtre
        $categories = Produit::select('category')->distinct()->pluck('category');

        return view('reapprovisionnements.create', compact('produits', 'categories', 'search', 'categorie'));
    }


    /**
     * Enregistrement d’un réapprovisionnement
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantity' => 'required|integer|min:0',
            'prix_achat_unitaire' => 'nullable|numeric|min:0',
            'date_reapprovisionnement' => 'required|date',
        ]);

        // Calcul de la valeur totale
        $requestData = $request->all();
        $requestData['valeur_totale'] = $request->quantity * ($request->prix_achat_unitaire ?? 0);

        // Création du réapprovisionnement
        $reapprovisionnement = Reapprovisionnement::create($requestData);

        // Mise à jour du stock du produit
        $produit = $reapprovisionnement->produit;
        $produit->quantity_in_stock += $request->quantity;
        $produit->save();

        return redirect()->route('reapprovisionnements.index')
            ->with('success', 'Réapprovisionnement enregistré et stock mis à jour.');
    }


    /**
     * Détails d’un réapprovisionnement
     */
    public function show(Reapprovisionnement $reapprovisionnement)
    {
        return view('reapprovisionnements.show', compact('reapprovisionnement'));
    }

    /**
     * Formulaire d’édition
     */
    public function edit(Reapprovisionnement $reapprovisionnement)
    {
        $produits = Produit::orderBy('name')->get();
        return view('reapprovisionnements.edit', compact('reapprovisionnement', 'produits'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, Reapprovisionnement $reapprovisionnement)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantity' => 'required|integer|min:0',
            'prix_achat_unitaire' => 'nullable|numeric|min:0',
            'date_reapprovisionnement' => 'required|date',
        ]);

        $requestData = $request->all();
        $requestData['valeur_totale'] = $request->quantity * ($request->prix_achat_unitaire ?? 0);

        $reapprovisionnement->update($requestData);

        return redirect()->route('reapprovisionnements.index')
            ->with('success', 'Réapprovisionnement mis à jour.');
    }

    /**
     * Suppression
     */
    public function destroy(Reapprovisionnement $reapprovisionnement)
    {
        $reapprovisionnement->produit->decrement('quantity_in_stock', $reapprovisionnement->quantity);
        $reapprovisionnement->delete();
        return redirect()->route('reapprovisionnements.index')
            ->with('success', 'Réapprovisionnement supprimé.');
    }
}
