@extends('layouts.app')

@section('title', 'Ajouter un Produit')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Ajouter un produit</h1>

    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">

            <!-- Nom -->
            <div class="col-md-6">
                <label class="form-label">Nom <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Référence -->
            <div class="col-md-6">
                <label class="form-label">Référence</label>
                <input type="text" name="reference" class="form-control" value="{{ old('reference') }}">
                @error('reference')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Catégorie -->
            <div class="col-md-6">
                <label class="form-label">Catégorie</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                @error('category')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Quantité en stock -->
            <div class="col-md-6">
                <label class="form-label">Quantité en stock <span class="text-danger">*</span></label>
                <input type="number" name="quantity_in_stock" class="form-control" min="0" required value="{{ old('quantity_in_stock') }}">
                @error('quantity_in_stock')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Prix d'achat unitaire -->
            <div class="col-md-4">
                <label class="form-label">Prix Achat (unitaire)</label>
                <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ old('unit_price') }}">
                @error('unit_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Prix de vente -->
            <div class="col-md-4">
                <label class="form-label">Prix Vente (unitaire)</label>
                <input type="number" step="0.01" name="seller_price" class="form-control" value="{{ old('seller_price') }}">
                @error('seller_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Prix lot -->
            <div class="col-md-4">
                <label class="form-label">Prix Vente par Lot</label>
                <input type="number" step="0.01" name="lot_price" class="form-control" value="{{ old('lot_price') }}">
                @error('lot_price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Unités par lot -->
            <div class="col-md-4">
                <label class="form-label">Unités par Lot</label>
                <input type="number" name="units_per_lot" min="1" class="form-control" value="{{ old('units_per_lot', 1) }}">
                @error('units_per_lot')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Seuil d’alerte -->
            <div class="col-md-4">
                <label class="form-label">Seuil d’Alerte</label>
                <input type="number" name="alert_seuil" min="0" class="form-control" value="{{ old('alert_seuil') }}">
                @error('alert_seuil')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div class="col-md-4">
                <label class="form-label">Image (optionnelle)</label>
                <input type="file" name="image_path" class="form-control">
                @error('image_path')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection