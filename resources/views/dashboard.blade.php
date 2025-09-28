@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    <!-- Widgets -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-primary h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">Stock Total</h6>
                    <h3 class="card-text">{{ $stockTotal }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-success h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">Valeur du Stock</h6>
                    <h3 class="card-text">{{ number_format($valeurStock, 2, ',', ' ') }} CFA</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-warning h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">Ventes du jour</h6>
                    <h3 class="card-text">{{ number_format($ventesDuJour, 2, ',', ' ') }} CFA</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-white bg-danger h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">Bénéfice du jour</h6>
                    <h3 class="card-text">{{ number_format($beneficeDuJour, 2, ',', ' ') }} CFA</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Dernières opérations -->
    <div class="row g-4">
        <div class="col-md-6">
            <h4 class="mb-3">Dernières ventes</h4>
            <div class="table-responsive shadow-sm">
                <table class="table table-striped table-hover align-middle text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Qté</th>
                            <th>Total (CFA)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dernieresVentes as $vente)
                        <tr>
                            <td>{{ $vente->date_vente->format('d/m/Y') }}</td>
                            <td>{{ $vente->produit->name }}</td>
                            <td>{{ $vente->quantite_vendue }}</td>
                            <td>{{ number_format($vente->quantite_vendue * $vente->prix_vente_unitaire, 2, ',', ' ') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucune vente récente.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <h4 class="mb-3">Derniers réapprovisionnements</h4>
            <div class="table-responsive shadow-sm">
                <table class="table table-striped table-hover align-middle text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Qté</th>
                            <th>Valeur (CFA)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dernieresReappro as $reappro)
                        <tr>
                            <td>{{ $reappro->date_reapprovisionnement->format('d/m/Y') }}</td>
                            <td>{{ $reappro->produit->name }}</td>
                            <td>{{ $reappro->quantity }}</td>
                            <td>{{ number_format($reappro->quantity * $reappro->prix_unitaire, 2, ',', ' ') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucun réapprovisionnement récent.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection