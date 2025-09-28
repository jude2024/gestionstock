@extends('layouts.app')

@section('title', 'Détail Vente')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <div class="text-center mb-3">
            <h2>{{ $vente->produit->name }}</h2>
            @if($vente->produit->image_path)
            <img src="{{ asset('storage/' . $vente->produit->image_path) }}"
                alt="{{ $vente->produit->name }}"
                class="rounded mb-3" style="max-width:250px; height:auto;">
            @endif
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Quantité vendue :</strong> {{ $vente->quantite_vendue }}</li>
            <li class="list-group-item"><strong>Prix unitaire :</strong> {{ number_format($vente->prix_vente_unitaire, 2) }} CFA</li>
            <li class="list-group-item"><strong>Valeur totale :</strong> {{ number_format($vente->valeur_totale, 2) }} CFA</li>
            <li class="list-group-item"><strong>Date de vente :</strong> {{ $vente->date_vente->format('d/m/Y') }}</li>
        </ul>

        <div class="mt-3 text-center">
            <a href="{{ route('ventes.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection