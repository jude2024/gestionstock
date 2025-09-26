@extends('layouts.app')

@section('title', 'Détails du Produit Avarié')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm w-75">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Détails du Produit Avarié</h4>
        </div>
        <div class="card-body text-center">

            @if($avarie->produit && $avarie->produit->image_path)
            <img src="{{ asset('storage/' . $avarie->produit->image_path) }}"
                alt="{{ $avarie->produit->name }}"
                class="img-thumbnail mb-3" style="width:150px; height:150px; object-fit:cover;">
            @endif

            <h5 class="card-title mb-2">{{ $avarie->produit->name ?? '—' }}</h5>
            <p><strong>Catégorie :</strong> {{ $avarie->produit->category ?? '—' }}</p>
            <p><strong>Quantité Avariée :</strong> {{ $avarie->quantite_avariee ?? '—' }}</p>
            <p><strong>Montant :</strong> {{ $avarie->montant ?? '—' }} €</p>
            <p><strong>Raison :</strong> {{ $avarie->raison ?? '—' }}</p>
            <p><strong>Date de l’Avarie :</strong> {{ $avarie->date_avarie ? \Carbon\Carbon::parse($avarie->date_avarie)->format('d/m/Y') : '—' }}</p>

        </div>
        <div class="card-footer text-center">
            <a href="{{ route('avaries.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection