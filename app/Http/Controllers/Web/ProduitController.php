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
        // Récupérer les catégories distinctes pour le filtre
        $categories = Produit::select('category')
            ->distinct()
            ->pluck('category')
            ->filter(); // enlève les nulls

        // Construire la requête
        $query = Produit::query();

        // Filtrer par recherche sur le nom
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        // Filtrer par catégorie
        if ($request->filled('categorie')) {
            $query->where('category', $request->input('categorie'));
        }

        // Pagination
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
            'alert_seuil'       => 'nullable|integer|min:0',
            'image_path'        => 'nullable|image|mimes:jpg,jpeg,png',
        ], [
            'name.required' => 'Le nom du produit est obligatoire.',
            'name.string'   => 'Le nom doit être une chaîne de caractères.',
            'name.max'      => 'Le nom ne doit pas dépasser 255 caractères.',

            'reference.max' => 'La référence ne doit pas dépasser 100 caractères.',
            'reference.unique' => 'Cette référence existe déjà.',

            'quantity_in_stock.integer' => 'La quantité en stock doit être un nombre entier.',
            'quantity_in_stock.min' => 'La quantité en stock doit être au moins 0.',

            'unit_price.numeric' => 'Le prix unitaire doit être un nombre.',
            'unit_price.min' => 'Le prix unitaire doit être positif.',

            'seller_price.numeric' => 'Le prix de vente doit être un nombre.',
            'seller_price.min' => 'Le prix de vente doit être positif.',

            'alert_seuil.integer' => 'Le seuil d’alerte doit être un entier.',
            'alert_seuil.min' => 'Le seuil d’alerte doit être au moins 0.',

            'image_path.image' => 'Le fichier doit être une image.',
            'image_path.mimes' => 'L’image doit être au format jpg, jpeg ou png.',
        ]);


        $data = $request->except('image_path');
        // Upload de l’image si fournie
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
            // 'reference'         => 'nullable|string|max:100|unique:produits,reference,' . $produit->id,
            /*'quantity_in_stock' => 'nullable|integer|min:0',
            'category'          => 'nullable|string|max:100',
            'description'       => 'nullable|string',
            'unit_price'        => 'required|numeric|min:0',
            'seller_price'      => 'nullable|numeric|min:0',
            'alert_seuil'       => 'nullable|integer|min:0',*/
            'image_path'        => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->except('image_path');

        // Upload de la nouvelle image si fournie
        if ($request->hasFile('image_path')) {
            // Supprimer l’ancienne image si elle existe
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
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
