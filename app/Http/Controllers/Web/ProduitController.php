<?php

namespace App\Http\Controllers\Web;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduitController extends Controller
{
    /**
     * Liste des produits
     */
    public function index(Request $request)
    {
        $categories = Produit::select('category')
            ->distinct()
            ->pluck('category')
            ->filter();

        $query = Produit::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', "%" . $request->input('search') . "%");
        }

        if ($request->filled('categorie')) {
            $query->where('category', $request->input('categorie'));
        }

        $produits = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('produits.index', compact('produits', 'categories'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Enregistrement d’un nouveau produit
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'reference'         => 'nullable|string|max:100|unique:produits,reference',
            'quantity_in_stock' => 'required|integer|min:0',
            'category'          => 'nullable|string|max:100',
            'description'       => 'nullable|string',
            'unit_price'        => 'nullable|numeric|min:0',
            'seller_price'      => 'nullable|numeric|min:0',
            'lot_price'         => 'nullable|numeric|min:0',
            'units_per_lot'     => 'nullable|integer|min:1',
            'alert_seuil'       => 'nullable|integer|min:0',
            'image_path'        => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->except('image_path');

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('produits', 'public');
        }

        Produit::create($data);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Affichage d’un produit
     */
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    /**
     * Formulaire d’édition
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    /**
     * Mise à jour d’un produit
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'name'              => 'nullable|string|max:255',
            'reference'         => 'nullable|string|max:100|unique:produits,reference,' . $produit->id,
            'quantity_in_stock' => 'nullable|integer|min:0',
            'category'          => 'nullable|string|max:100',
            'description'       => 'nullable|string',
            'unit_price'        => 'nullable|numeric|min:0',
            'seller_price'      => 'nullable|numeric|min:0',
            'lot_price'         => 'nullable|numeric|min:0',
            'units_per_lot'     => 'nullable|integer|min:1',
            'alert_seuil'       => 'nullable|integer|min:0',
            'image_path'        => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->except('image_path');

        if ($request->hasFile('image_path')) {
            if ($produit->image_path && file_exists(storage_path('app/public/' . $produit->image_path))) {
                unlink(storage_path('app/public/' . $produit->image_path));
            }
            $data['image_path'] = $request->file('image_path')->store('produits', 'public');
        }

        $produit->update($data);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Suppression d’un produit
     */
    public function destroy(Produit $produit)
    {
        if ($produit->image_path && file_exists(storage_path('app/public/' . $produit->image_path))) {
            unlink(storage_path('app/public/' . $produit->image_path));
        }

        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
