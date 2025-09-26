@extends('layouts.app')

@section('title', 'Liste des Dépenses')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des Dépenses</h1>
        <a href="{{ route('depenses.create') }}" class="btn btn-primary">+ Ajouter une dépense</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="mb-3">
    <form method="GET" action="{{ route('depenses.index') }}" class="row g-2 align-items-end">
        <div class="col-md-3">
            <label class="form-label">Date début</label>
            <input type="date" name="date_start" class="form-control" value="{{ request('date_start') }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Date fin</label>
            <input type="date" name="date_end" class="form-control" value="{{ request('date_end') }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>
        <div class="col-md-3">
            <a href="{{ route('depenses.index') }}" class="btn btn-secondary w-100">Réinitialiser</a>
        </div>
    </form>
</div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Description</th>
                    <th>Montant (€)</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($depenses as $depense)
                <tr>
                    <td>{{ $depense->description }}</td>
                    <td>{{ number_format($depense->montant, 2, ',', ' ') }}</td>
                    <td>{{ $depense->date_depense ? $depense->date_depense->format('d/m/Y') : '—' }}</td>
                    <td>
                        <a href="{{ route('depenses.show', $depense) }}" class="btn btn-info btn-sm mb-1">Voir</a>
                        <a href="{{ route('depenses.edit', $depense) }}" class="btn btn-warning btn-sm mb-1">Modifier</a>
                        <form action="{{ route('depenses.destroy', $depense) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mb-1" onclick="return confirm('Supprimer cette dépense ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Aucune dépense trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
@section('pagination')
<div class="d-flex justify-content-center mt-4">
    {{ $depenses->links('pagination::bootstrap-5') }}
</div>
@endsection