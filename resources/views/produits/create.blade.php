@extends('layouts.app')

@section('title', 'Ajouter un Produit')

@section('content')
<div class="container mt-4">

    <h1>Ajouter un produit</h1>

    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Référence</label>
            <input type="text" name="reference" class="form-control" value="{{ old('reference') }}">
            @error('reference')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Quantité en stock</label>
            <input type="number" name="quantity_in_stock" class="form-control" min="0" required value="{{ old('quantity_in_stock') }}">
            @error('quantity_in_stock')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Prix unitaire</label>
            <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ old('unit_price') }}">
            @error('unit_price')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Prix de vente</label>
            <input type="number" step="0.01" name="seller_price" class="form-control" value="{{ old('seller_price') }}">
            @error('seller_price')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Seuil d’alerte</label>
            <input type="number" name="alert_seuil" class="form-control" value="{{ old('alert_seuil') }}">
            @error('alert_seuil')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <input type="text" name="category" class="form-control" value="{{ old('category') }}">
            @error('category')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            @error('description')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image (optionnelle)</label>
            <input type="file" name="image_path" class="form-control">
            @error('image_path')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection