@extends('layouts.app')

@section('title', 'Ajouter une Vente')

@section('content')
<div class="container mt-4">
    <h1>Ajouter une vente</h1>

    {{-- Formulaire de recherche / filtre --}}
    <form action="{{ route('ventes.create') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-6">
            <label class="form-label">Recherche par produit</label>
            <input type="text" name="search_produit" class="form-control"
                value="{{ request('search_produit') }}" placeholder="Nom du produit">
        </div>

        <div class="col-md-6">
            <label class="form-label">Filtrer par catégorie</label>
            <select name="categorie" class="form-select">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $categorie)
                <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>
                    {{ $categorie }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="{{ route('ventes.create') }}" class="btn btn-secondary">Réinitialiser</a>
        </div>
    </form>

    {{-- Formulaire d'ajout de vente --}}
    <form action="{{ route('ventes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Produit</label>
            <select name="produit_id" class="form-select @error('produit_id') is-invalid @enderror">
                <option value="">-- Sélectionner un produit --</option>
                @foreach($produits as $produit)
                <option value="{{ $produit->id }}"
                    {{ old('produit_id') == $produit->id ? 'selected' : '' }}>
                    {{ $produit->name }} ({{ $produit->category ?? '—' }})
                </option>
                @endforeach
            </select>
            @error('produit_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Quantité vendue</label>
            <input type="number" name="quantite_vendue"
                class="form-control @error('quantite_vendue') is-invalid @enderror"
                value="{{ old('quantite_vendue') }}" min="1">
            @error('quantite_vendue')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Prix unitaire</label>
            <input type="number" step="0.01" name="prix_vente_unitaire"
                class="form-control @error('prix_vente_unitaire') is-invalid @enderror"
                value="{{ old('prix_vente_unitaire') }}">
            @error('prix_vente_unitaire')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Date de vente</label>
            <input type="date" name="date_vente"
                class="form-control @error('date_vente') is-invalid @enderror"
                value="{{ old('date_vente') }}">
            @error('date_vente')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('ventes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection