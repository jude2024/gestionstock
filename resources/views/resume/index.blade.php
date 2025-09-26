@extends('layouts.app')

@section('title', 'Résumé et Statistiques')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Tableau de Bord</h1>

    {{-- Filtre et recherche --}}
    <form method="GET" action="{{ route('resume.index') }}" class="row g-3 mb-4">
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
            <a href="{{ route('resume.index') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>

    {{-- Statistiques globales --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h5>Total Ventes</h5>
                    <p>{{ number_format($total_ventes, 2) }} €</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-danger text-white">
                <div class="card-body">
                    <h5>Total Dépenses</h5>
                    <p>{{ number_format($total_depenses, 2) }} €</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-warning text-white">
                <div class="card-body">
                    <h5>Total Avaries</h5>
                    <p>{{ number_format($total_avaries, 2) }} €</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-primary text-white">
                <div class="card-body">
                    <h5>Bénéfice Brut</h5>
                    <p>{{ number_format($benefice_brut, 2) }} €</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Inventaire Produits --}}
    <h3>Inventaire Produits</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Catégorie</th>
                    <th>Stock Actuel</th>
                    <th>Valeur Achat</th>
                    <th>Valeur Vente</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventaire as $item)
                <tr>
                    <td>
                        @if($item['produit']->image_path)
                        <img src="{{ asset('storage/' . $item['produit']->image_path) }}"
                            alt="{{ $item['produit']->name }}" class="rounded" style="width:60px; height:60px; object-fit:cover;">
                        @else
                        <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $item['produit']->name }}</td>
                    <td>{{ $item['produit']->category ?? '—' }}</td>
                    <td>{{ $item['stock_actuel'] }}</td>
                    <td>{{ number_format($item['valeur_achat'], 2, ',', ' ') }} €</td>
                    <td>{{ number_format($item['valeur_vente'], 2, ',', ' ') }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $produits->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection