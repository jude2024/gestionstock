@extends('layouts.app')

@section('title', 'Détails du Réapprovisionnement')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg" style="max-width: 500px; width: 100%;">
        <div class="card-header text-center bg-primary text-white">
            <h4>Détails du Réapprovisionnement</h4>
        </div>
        <div class="card-body text-center">
            @if($reapprovisionnement->produit && $reapprovisionnement->produit->image_path)
            <img src="{{ asset('storage/' . $reapprovisionnement->produit->image_path) }}"
                alt="{{ $reapprovisionnement->produit->name }}"
                class="img-thumbnail mb-3"
                style="width:150px; height:150px; object-fit:cover;">
            @endif

            <h5 class="card-title mb-3">{{ $reapprovisionnement->produit->name ?? '—' }}</h5>

            <p class="mb-1"><strong>Catégorie :</strong> {{ $reapprovisionnement->produit->category ?? '—' }}</p>
            <p class="mb-1"><strong>Quantité :</strong> {{ $reapprovisionnement->quantity }}</p>
            <p class="mb-1"><strong>Prix Achat Unitaire :</strong> {{ $reapprovisionnement->prix_achat_unitaire ?? '—' }} €</p>
            <p class="mb-1"><strong>Valeur Totale :</strong> {{ $reapprovisionnement->valeur_totale ?? '—' }} €</p>
            <p class="mb-1"><strong>Date Réapprovisionnement :</strong> {{ $reapprovisionnement->date_reapprovisionnement ? \Carbon\Carbon::parse($reapprovisionnement->date_reapprovisionnement)->format('d/m/Y') : '—' }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('reapprovisionnements.index') }}" class="btn btn-secondary me-2">Retour</a>
            <a href="{{ route('reapprovisionnements.edit', $reapprovisionnement) }}" class="btn btn-warning">Modifier</a>
        </div>
    </div>
</div>
@endsection