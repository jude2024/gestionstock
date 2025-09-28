@extends('layouts.app')

@section('title', 'Modifier un Produit')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Modifier le produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <!-- Nom -->
            <div class="col-md-6">
                <label class="form-label">Nom <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $produit->name) }}" required>
                @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Référence -->
            <div class="col-md-6">
                <label class="form-label">Référence</label>
                <input type="text" name="reference" class="form-control" value="{{ old('reference', $produit->reference) }}">
                @error('reference')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Catégorie -->
            <div class="col-md-6">
                <label class="form-label">Catégorie</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $produit->category) }}">
                @error('category')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Quantité en stock -->
            <div class="col-md-6">
                <label class="form-label">Quantité en stock <span class="text-danger">*</span></label>
                <input type="number" name="quantity_in_stock" class="form-control" min="0" required value="{{ old('quantity_in_stock', $produit->quantity_in_stock) }}">
                @error('quantity_in_stock')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Prix d'achat unitaire -->
            <div class="col-md-4">
                <label class="form-label">Prix Achat (unitaire)</label>
                <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ old('unit_price', $produit->unit_price) }}">
                @error('unit_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Prix de vente -->
            <div class="col-md-4">
                <label class="form-label">Prix Vente (unitaire)</label>
                <input type="number" step="0.01" name="seller_price" class="form-control" value="{{ old('seller_price', $produit->seller_price) }}">
                @error('seller_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Prix lot -->
            <div class="col-md-4">
                <label class="form-label">Prix Vente par Lot</label>
                <input type="number" step="0.01" name="lot_price" class="form-control" value="{{ old('lot_price', $produit->lot_price) }}">
                @error('lot_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Unités par lot -->
            <div class="col-md-4">
                <label class="form-label">Unités par Lot</label>
                <input type="number" name="units_per_lot" min="1" class="form-control" value="{{ old('units_per_lot', $produit->units_per_lot) }}">
                @error('units_per_lot')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Seuil d’alerte -->
            <div class="col-md-4">
                <label class="form-label">Seuil d’Alerte</label>
                <input type="number" name="alert_seuil" min="0" class="form-control" value="{{ old('alert_seuil', $produit->alert_seuil) }}">
                @error('alert_seuil')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div class="col-md-4">
                <label class="form-label">Image (optionnelle)</label>
                @if($produit->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $produit->image_path) }}" alt="{{ $produit->name }}" width="100" class="rounded">
                </div>
                @endif
                <input type="file" name="image_path" class="form-control">
                @error('image_path')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $produit->description) }}</textarea>
                @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection