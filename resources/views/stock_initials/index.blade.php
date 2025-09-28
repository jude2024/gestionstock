@extends('layouts.app')

@section('title', 'Liste des Stocks Initiaux')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Stocks Initiaux</h1>
        <a href="{{ route('stock_initials.create') }}" class="btn btn-primary">+ Ajouter un stock</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="GET" action="{{ route('stock_initials.index') }}" class="row g-3 mb-4">

        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par produit"
                value="{{ request('search') }}">
        </div>

        <div class="col-md-2">
            <select name="categorie" class="form-select">
                <option value="">-- Catégorie --</option>
                @foreach($categories as $categorie)
                <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>
                    {{ $categorie }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <input type="number" name="quantity_min" class="form-control" placeholder="Qté min"
                value="{{ request('quantity_min') }}">
        </div>

        <div class="col-md-2">
            <input type="number" name="quantity_max" class="form-control" placeholder="Qté max"
                value="{{ request('quantity_max') }}">
        </div>

        <div class="col-md-2">
            <input type="number" step="0.01" name="valeur_min" class="form-control" placeholder="Valeur min"
                value="{{ request('valeur_min') }}">
        </div>

        <div class="col-md-2">
            <input type="number" step="0.01" name="valeur_max" class="form-control" placeholder="Valeur max"
                value="{{ request('valeur_max') }}">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>
    </form>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>Produit</th>
                <th>Image</th>
                <th>Quantité</th>
                <th>Prix Achat Unitaire</th>
                <th>Valeur Totale</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stocks as $stock)
            <tr class="text-center">
                <td>{{ $stock->produit->name ?? '—' }}</td>
                <td>
                    @if($stock->produit && $stock->produit->image_path)
                    <img src="{{ asset('storage/' . $stock->produit->image_path) }}" alt="{{ $stock->produit->name }}" width="60" height="60" class="rounded">
                    @else
                    <span class="text-muted">—</span>
                    @endif
                </td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->prix_achat_unitaire ?? '—' }} CFA</td>
                <td>{{ $stock->valeur_totale ?? '—' }} CFA</td>
                <td>
                    <a href="{{ route('stock_initials.show', $stock) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('stock_initials.edit', $stock) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('stock_initials.destroy', $stock) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce stock ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Aucun stock trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $stocks->links() }}
    </div>

</div>
@endsection