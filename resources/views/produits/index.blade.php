@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Liste des Produits</h1>
        <a href="{{ route('produits.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Ajouter un produit
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Formulaire de recherche et filtre --}}
    <form method="GET" action="{{ route('produits.index') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Recherche par nom" value="{{ request('search') }}">
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
        <div class="col-md-4 d-flex">
            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-search"></i> Rechercher</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Réinitialiser</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Référence</th>
                    <th>Stock</th>
                    <th>Prix Achat</th>
                    <th>Prix Vente</th>
                    <th>Prix Lot</th>
                    <th>Unités/Lot</th>
                    <th>Seuil Alerte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produits as $produit)
                <tr>
                    <td class="text-center">
                        @if($produit->image_path)
                        <img src="{{ asset('storage/' . $produit->image_path) }}"
                            alt="{{ $produit->name }}"
                            class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                        <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $produit->name }}</td>
                    <td>{{ $produit->category ?? '-' }}</td>
                    <td>{{ $produit->reference ?? '-' }}</td>
                    <td>
                        @if($produit->quantity_in_stock <= $produit->alert_seuil)
                            <span class="badge bg-danger">{{ $produit->quantity_in_stock }}</span>
                            @else
                            <span class="badge bg-success">{{ $produit->quantity_in_stock }}</span>
                            @endif
                    </td>
                    <td>{{ number_format($produit->unit_price, 2, ',', ' ') }} CFA</td>
                    <td>{{ number_format($produit->seller_price, 2, ',', ' ') }} CFA</td>
                    <td>{{ number_format($produit->lot_price, 2, ',', ' ') }} CFA</td>
                    <td>{{ $produit->units_per_lot }}</td>
                    <td>{{ $produit->alert_seuil ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('produits.show', $produit) }}" class="btn btn-info btn-sm mb-1">
                            <i class="bi bi-eye"></i> Voir
                        </a>
                        <a href="{{ route('produits.edit', $produit) }}" class="btn btn-warning btn-sm mb-1">
                            <i class="bi bi-pencil-square"></i> Modifier
                        </a>
                        <form action="{{ route('produits.destroy', $produit) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mb-1" onclick="return confirm('Supprimer ce produit ?')">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center">Aucun produit trouvé</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $produits->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection