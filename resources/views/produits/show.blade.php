@extends('layouts.app')

@section('title', 'Détail Produit')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Card principale --}}
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">{{ $produit->name }}</h2>
                </div>

                <div class="card-body text-center">

                    {{-- Image produit --}}
                    @if($produit->image_path)
                    <img src="{{ asset('storage/' . $produit->image_path) }}"
                        alt="{{ $produit->name }}"
                        class="img-fluid rounded mb-4 shadow"
                        style="max-height: 300px;">
                    @else
                    <div class="bg-light rounded mb-4 py-5">
                        <span class="text-muted">Aucune image disponible</span>
                    </div>
                    @endif

                    {{-- Informations produit --}}
                    <div class="row text-start justify-content-center">
                        <div class="col-md-6 mb-2"><strong>Référence :</strong> {{ $produit->reference ?? '—' }}</div>
                        <div class="col-md-6 mb-2"><strong>Stock :</strong> {{ $produit->quantity_in_stock ?? '—' }}</div>
                        <div class="col-md-6 mb-2"><strong>Prix unitaire :</strong> {{ $produit->unit_price ?? '—' }} CFA</div>
                        <div class="col-md-6 mb-2"><strong>Prix de vente :</strong> {{ $produit->seller_price ?? '—' }} CFA</div>
                        <div class="col-md-6 mb-2"><strong>Prix par lot :</strong> {{ $produit->lot_price ?? '—' }} CFA</div>
                        <div class="col-md-6 mb-2"><strong>Unités par lot :</strong> {{ $produit->units_per_lot ?? '—' }}</div>
                        <div class="col-md-6 mb-2"><strong>Seuil d’alerte :</strong> {{ $produit->alert_seuil ?? '—' }}</div>
                        <div class="col-md-6 mb-2"><strong>Catégorie :</strong> {{ $produit->category ?? '—' }}</div>
                        <div class="col-12 mt-3">
                            <strong>Description :</strong>
                            <p class="border rounded p-3 bg-light">{{ $produit->description ?? 'Aucune description' }}</p>
                        </div>
                    </div>

                    {{-- Bouton retour --}}
                    <a href="{{ route('produits.index') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-arrow-left-circle"></i> Retour à la liste
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection