@extends('layouts.app')

@section('title', 'Détails de la Dépense')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm w-50">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Détails de la Dépense</h4>
        </div>
        <div class="card-body text-center">
            <p><strong>Description :</strong> {{ $depense->description ?? '—' }}</p>
            <p><strong>Montant :</strong> {{ $depense->montant ?? '—' }} €</p>
            <p><strong>Date :</strong> {{ $depense->date_depense ? $depense->date_depense->format('d/m/Y') : '—' }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('depenses.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
