@extends('layouts.app')

@section('title', 'Détail Stock Initial')

@section('content')
<div class="container mt-4 text-center">

    <h1 class="mb-4">{{ $stockInitial->produit->name ?? '—' }}</h1>

    @if($stockInitial->produit && $stockInitial->produit->image_path)
    <img src="{{ asset('storage/' . $stockInitial->produit->image_path) }}" alt="{{ $stockInitial->produit->name }}" class="mb-4 rounded" style="max-width:300px;">
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <ul class="list-group text-start">
                <li class="list-group-item"><strong>Quantité :</strong> {{ $stockInitial->quantity }}</li>
                <li class="list-group-item"><strong>Prix Achat Unitaire :</strong> {{ $stockInitial->prix_achat_unitaire ?? '—' }} €</li>
                <li class="list-group-item"><strong>Valeur Totale :</strong> {{ $stockInitial->valeur_totale ?? '—' }} €</li>
            </ul>
        </div>
    </div>

    <a href="{{ route('stock_initials.index') }}" class="btn btn-primary mt-4">Retour</a>
</div>
@endsection