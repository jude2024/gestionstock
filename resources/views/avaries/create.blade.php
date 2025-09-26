@extends('layouts.app')

@section('title', 'Ajouter un Produit Avarié')

@section('content')
<div class="container mt-4">

    <h1>Ajouter un Produit Avarié</h1>

    {{-- Formulaire de filtre pour le select produit --}}
    <form method="GET" action="{{ route('avaries.create') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Rechercher un produit" value="{{ request('search') }}">
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
        <div class="col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            <a href="{{ route('avaries.create') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>

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

    {{-- Formulaire d'ajout --}}
    <form action="{{ route('avaries.store') }}" method="POST">
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
            <label class="form-label">Quantité Avariée</label>
            <input type="number" name="quantite_avariee" class="form-control" min="0" value="{{ old('quantite_avariee') }}" required>
        </div>

        

        <div class="mb-3">
            <label class="form-label">Raison</label>
            <input type="text" name="raison" class="form-control" value="{{ old('raison') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Date de l’Avarie</label>
            <input type="date" name="date_avarie" class="form-control" value="{{ old('date_avarie') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('avaries.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

</div>
@endsection