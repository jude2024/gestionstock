@extends('layouts.app')

@section('title', 'Récapitulatif des Ventes')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Récapitulatif des Ventes</h1>

    {{-- Formulaire de filtre --}}
    <form method="GET" action="{{ route('vente.recap') }}" class="row g-3 mb-4">

        {{-- Choix du type de filtre --}}
        <div class="col-md-3">
            <label for="filter_type" class="form-label">Type de filtre</label>
            <select id="filter_type" class="form-select" name="filter_type">
                <option value="date" {{ request('filter_type') == 'date' ? 'selected' : '' }}>Date exacte</option>
                <option value="interval" {{ request('filter_type') == 'interval' ? 'selected' : '' }}>Intervalle</option>
            </select>
        </div>

        {{-- Date exacte --}}
        <div class="col-md-3 filter-date">
            <label for="date" class="form-label">Date exacte</label>
            <input
                type="date"
                id="date"
                name="date"
                class="form-control"
                value="{{ request('date') }}">
        </div>

        {{-- Intervalle de dates --}}
        <div class="col-md-3 filter-interval">
            <label for="date_start" class="form-label">Date début</label>
            <input
                type="date"
                id="date_start"
                name="date_start"
                class="form-control"
                value="{{ request('date_start') }}">
        </div>

        <div class="col-md-3 filter-interval">
            <label for="date_end" class="form-label">Date fin</label>
            <input
                type="date"
                id="date_end"
                name="date_end"
                class="form-control"
                value="{{ request('date_end') }}">
        </div>

        {{-- Boutons --}}
        <div class="col-md-3 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            <a href="{{ route('vente.recap') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>


    {{-- Tableau des ventes --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Produit</th>
                    <th>Image</th>
                    <th>Quantité vendue</th>
                    <th>Prix unitaire (€)</th>
                    <th>Total (€)</th>
                    <th>Date Vente</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ventes as $vente)
                <tr>
                    <td>{{ $vente->produit->name ?? '—' }}</td>
                    <td>
                        @if($vente->produit && $vente->produit->image_path)
                        <img src="{{ asset('storage/' . $vente->produit->image_path) }}" alt="{{ $vente->produit->name }}" style="width:60px; height:60px; object-fit:cover;">
                        @else
                        <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $vente->quantite_vendue }}</td>
                    <td>{{ number_format($vente->prix_vente_unitaire, 2, ',', ' ') }}</td>
                    <td>{{ number_format($vente->quantite_vendue * $vente->prix_vente_unitaire, 2, ',', ' ') }}</td>
                    <td>{{ \Carbon\Carbon::parse($vente->date_vente)->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Aucune vente trouvée pour cette période.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Total --}}
    <div class="mt-3 text-end">
        <h5>Total des ventes : {{ number_format($total_ventes, 2, ',', ' ') }} €</h5>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $ventes->links('pagination::bootstrap-5') }}
    </div>

</div>

{{-- Script pour afficher/cacher dynamiquement --}}
<script>
    function toggleFilters() {
        let type = document.getElementById('filter_type').value;
        document.querySelectorAll('.filter-date').forEach(el => el.style.display = (type === 'date') ? 'block' : 'none');
        document.querySelectorAll('.filter-interval').forEach(el => el.style.display = (type === 'interval') ? 'block' : 'none');
    }

    document.getElementById('filter_type').addEventListener('change', toggleFilters);
    window.addEventListener('DOMContentLoaded', toggleFilters);
</script>
@endsection