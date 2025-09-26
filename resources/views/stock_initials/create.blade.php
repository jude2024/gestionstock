@extends('layouts.app')

@section('title', 'Ajouter un Stock Initial')

@section('content')
<div class="container mt-4">
    <h1>Ajouter un Stock Initial</h1>

    {{-- Affichage des erreurs --}}
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Formulaire de filtre produit --}}
    <form method="GET" action="{{ route('stock_initials.create') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par produit" value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="categorie" class="form-select">
                <option value="">-- Filtrer par catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>
                        {{ $categorie }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('stock_initials.create') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>

    {{-- Formulaire d'ajout de stock --}}
    <form action="{{ route('stock_initials.store') }}" method="POST">
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

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('stock_initials.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
