@extends('layouts.app')

@section('title', 'Réapprovisionner un Produit')

@section('content')
<div class="container mt-4">
    <h1>Réapprovisionner un Produit</h1>

    {{-- Formulaire de filtre pour produits --}}
    <form method="GET" action="{{ route('reapprovisionnements.create') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par produit" value="{{ $search ?? '' }}">
        </div>
        <div class="col-md-4">
            <select name="categorie" class="form-select">
                <option value="">-- Filtrer par catégorie --</option>
                @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ ($categorie ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('reapprovisionnements.create') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>

    {{-- Formulaire d'ajout de réapprovisionnement --}}
    <form action="{{ route('reapprovisionnements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Produit</label>
            <select name="produit_id" class="form-select" required>
                <option value="">-- Choisir un produit --</option>
                @foreach($produits as $produit)
                <option value="{{ $produit->id }}" {{ old('produit_id') == $produit->id ? 'selected' : '' }}>
                    {{ $produit->name }} @if($produit->category) ({{ $produit->category }}) @endif
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantité</label>
            <input type="number" name="quantity" class="form-control" min="0" value="{{ old('quantity') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prix Achat Unitaire</label>
            <input type="number" step="0.01" name="prix_achat_unitaire" class="form-control" value="{{ old('prix_achat_unitaire') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Date de Réapprovisionnement</label>
            <input type="date" name="date_reapprovisionnement" class="form-control" value="{{ old('date_reapprovisionnement') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('reapprovisionnements.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection