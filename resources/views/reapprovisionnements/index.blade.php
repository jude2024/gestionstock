@extends('layouts.app')

@section('title', 'Liste des Réapprovisionnements')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Réapprovisionnements</h1>
        <a href="{{ route('reapprovisionnements.create') }}" class="btn btn-primary">+ Réapprovisionner un produit</a>
    </div>

    {{-- Filtres --}}
    <form method="GET" action="{{ route('reapprovisionnements.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par produit" value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="categorie" class="form-select">
                <option value="">-- Filtrer par catégorie --</option>
                @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ request('categorie') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('reapprovisionnements.index') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Produit</th>
                    <th>Image</th>
                    <th>Catégorie</th>
                    <th>Quantité</th>
                    <th>Prix Achat Unitaire</th>
                    <th>Valeur Totale</th>
                    <th>Date Réapprovisionnement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reapprovisionnements as $rea)
                <tr class="text-center">
                    <td>{{ $rea->produit->name ?? '—' }}</td>
                    <td>
                        @if($rea->produit && $rea->produit->image_path)
                        <img src="{{ asset('storage/' . $rea->produit->image_path) }}" alt="{{ $rea->produit->name }}" width="60" height="60" class="rounded">
                        @else
                        <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $rea->produit->category ?? '—' }}</td>
                    <td>{{ $rea->quantity }}</td>
                    <td>{{ $rea->prix_achat_unitaire ?? '—' }} €</td>
                    <td>{{ $rea->valeur_totale ?? '—' }} €</td>
                    <td>{{ $rea->date_reapprovisionnement ? \Carbon\Carbon::parse($rea->date_reapprovisionnement)->format('d/m/Y') : '—' }}</td>
                    <td>
                        <a href="{{ route('reapprovisionnements.show', $rea) }}" class="btn btn-info btn-sm">Voir</a>
                        <form action="{{ route('reapprovisionnements.destroy', $rea) }}" method="POST" class="d-inline">
                            @csrf

                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Aucun réapprovisionnement trouvé</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $reapprovisionnements->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection