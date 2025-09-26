@extends('layouts.app')

@section('title', 'Modifier un Produit')

@section('content')
<div class="container mt-4">

    <h1>Modifier le produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $produit->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Référence</label>
            <input type="text" name="reference" class="form-control" value="{{ old('reference', $produit->reference) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Quantité en stock</label>
            <input type="number" name="quantity_in_stock" class="form-control" min="0" value="{{ old('quantity_in_stock', $produit->quantity_in_stock) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Prix unitaire</label>
            <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ old('unit_price', $produit->unit_price) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Prix de vente</label>
            <input type="number" step="0.01" name="seller_price" class="form-control" value="{{ old('seller_price', $produit->seller_price) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Seuil d’alerte</label>
            <input type="number" name="alert_seuil" class="form-control" value="{{ old('alert_seuil', $produit->alert_seuil) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $produit->category) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Image (optionnelle)</label>
            @if($produit->image_path)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $produit->image_path) }}" alt="{{ $produit->name }}" width="100" class="rounded">
            </div>
            @endif
            <input type="file" name="image_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour</button>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection