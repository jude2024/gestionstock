@extends('layouts.app')

@section('title', 'Modifier Dépense')

@section('content')
<div class="container mt-4">
    <h1>Modifier la Dépense</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('depenses.update', $depense) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $depense->description) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Montant (CFA)</label>
            <input type="number" step="0.01" name="montant" class="form-control" value="{{ old('montant', $depense->montant) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date de la dépense</label>
            <input type="date" name="date_depense" class="form-control" value="{{ old('date_depense', $depense->date_depense ? $depense->date_depense->format('Y-m-d') : '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('depenses.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
