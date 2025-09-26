@extends('layouts.app')

@section('title', 'Liste des Produits Avariés')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Produits Avariés</h1>
        <a href="{{ route('avaries.create') }}" class="btn btn-primary">+ Ajouter un produit avarié</a>
    </div>

    {{-- Filtre --}}
    <form method="GET" action="{{ route('avaries.index') }}" class="row g-3 mb-4">
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
        <div class="col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            <a href="{{ route('avaries.index') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Produit</th>
                    <th>Catégorie</th>
                    <th>Image</th>
                    <th>Quantité Avariée</th>
                    <th>Montant</th>
                    <th>Raison</th>
                    <th>Date Avarie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($avaries as $avarie)
                <tr>
                    <td>{{ $avarie->produit->name ?? '—' }}</td>
                    <td>{{ $avarie->produit->category ?? '—' }}</td>
                    <td>
                        @if($avarie->produit && $avarie->produit->image_path)
                            <img src="{{ asset('storage/' . $avarie->produit->image_path) }}" 
                                 alt="{{ $avarie->produit->name }}" class="rounded" style="width:60px; height:60px; object-fit:cover;">
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $avarie->quantite_avariee }}</td>
                    <td>{{ number_format($avarie->montant, 2) }} €</td>
                    <td>{{ $avarie->raison ?? '—' }}</td>
                    <td>{{ $avarie->date_avarie ? \Carbon\Carbon::parse($avarie->date_avarie)->format('d/m/Y') : '—' }}</td>
                    <td>
                        <a href="{{ route('avaries.show', $avarie) }}" class="btn btn-info btn-sm mb-1">Voir</a>
                        <form action="{{ route('avaries.destroy', $avarie) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mb-1" onclick="return confirm('Supprimer ce produit avarié ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Aucun produit avarié trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $avaries->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
