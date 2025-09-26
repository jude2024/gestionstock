@extends('layouts.app')

@section('title', 'Modifier Stock Initial')

@section('content')
<div class="container mt-4">
    <h1>Modifier Stock Initial</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('stock_initials.update', $stockInitial) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Produit</label>
            <select name="produit_id" class="form-select" required>
                <option value="">-- Choisir un produit --</option>
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}" {{ old('produit_id', $stockInitial->produit_id) == $produit->id ? 'selected' : '' }}>
                        {{ $produit->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantité</label>
            <input type="number" name="quantity" class="form-control" min="0" value="{{ old('quantity', $stockInitial->quantity) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prix Achat Unitaire</label>
            <input type="number" step="0.01" name="prix_achat_unitaire" class="form-control" value="{{ old('prix_achat_unitaire', $stockInitial->prix_achat_unitaire) }}">
        </div>

       
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('stock_initials.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
