@extends('layouts.app')

@section('title', 'Liste des Ventes')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des Ventes</h1>
        <a href="{{ route('ventes.create') }}" class="btn btn-primary">+ Ajouter une vente</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('ventes.index') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label>Produit</label>
            <select name="produit_id" class="form-select">
                <option value="">Tous les produits</option>
                @foreach($produits as $produit)
                <option value="{{ $produit->id }}" {{ request('produit_id') == $produit->id ? 'selected' : '' }}>
                    {{ $produit->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label>Catégorie</label>
            <select name="categorie" class="form-select">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $categorie)
                <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>
                    {{ $categorie }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label>Date de vente (de)</label>
            <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
        </div>

        <div class="col-md-3">
            <label>Date de vente (à)</label>
            <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
        </div>

        <div class="col-md-3">
            <label>Stock min</label>
            <input type="number" name="stock_min" class="form-control" value="{{ request('stock_min') }}">
        </div>

        <div class="col-md-3">
            <label>Stock max</label>
            <input type="number" name="stock_max" class="form-control" value="{{ request('stock_max') }}">
        </div>

        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>

        <div class="col-md-3 align-self-end">
            <a href="{{ route('ventes.index') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>Image</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Valeur Totale</th>
                <th>Date de Vente</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventes as $vente)
            <tr class="text-center">
                <td>
                    @if($vente->produit->image_path)
                    <img src="{{ asset('storage/' . $vente->produit->image_path) }}"
                        alt="{{ $vente->produit->name }}"
                        class="rounded" style="width:80px; height:80px; object-fit:cover;">
                    @else
                    <span class="text-muted">—</span>
                    @endif
                </td>
                <td>{{ $vente->produit->name }}</td>
                <td>{{ $vente->quantite_vendue }}</td>
                <td>{{ number_format($vente->prix_vente_unitaire, 2) }} €</td>
                <td>{{ number_format($vente->valeur_totale, 2) }} €</td>
                <td>{{ $vente->date_vente ? $vente->date_vente->format('d/m/Y') : '—' }}</td>
                <td>
                    <a href="{{ route('ventes.show', $vente) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('ventes.edit', $vente) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('ventes.destroy', $vente) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer cette vente ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Aucune vente trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $ventes->links() }} {{-- Pagination --}}
    </div>

</div>
@endsection