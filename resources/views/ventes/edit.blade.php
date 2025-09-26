@extends('layouts.app')

@section('title', 'Modifier une Vente')

@section('content')
<div class="container mt-4">
    <h1>Modifier la vente</h1>

    <form action="{{ route('ventes.update', $vente) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Produit</label>
            <select name="produit_id" class="form-select @error('produit_id') is-invalid @enderror">
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}" {{ $vente->produit_id == $produit->id ? 'selected' : '' }}>
                        {{ $produit->name }}
                    </option>
                @endforeach
            </select>
            @error('produit_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Quantité vendue</label>
            <input type="number" name="quantite_vendue" class="form-control @error('quantite_vendue') is-invalid @enderror"
                   value="{{ old('quantite_vendue', $vente->quantite_vendue) }}" min="1">
            @error('quantite_vendue')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Prix unitaire</label>
            <input type="number" step="0.01" name="prix_vente_unitaire"
                   class="form-control @error('prix_vente_unitaire') is-invalid @enderror"
                   value="{{ old('prix_vente_unitaire', $vente->prix_vente_unitaire) }}">
            @error('prix_vente_unitaire')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Date de vente</label>
            <input type="date" name="date_vente"
                   class="form-control @error('date_vente') is-invalid @enderror"
                   value="{{ old('date_vente', $vente->date_vente->format('Y-m-d')) }}">
            @error('date_vente')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('ventes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
