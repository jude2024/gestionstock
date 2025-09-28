@extends('layouts.app')

@section('title', 'Modifier une Vente')

@section('content')
<div class="container mt-4">
    <h1>Modifier la vente</h1>

    <form action="{{ route('ventes.update', $vente) }}" method="POST" id="form-vente">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Produit</label>
                <select name="produit_id" id="produit_id" class="form-select @error('produit_id') is-invalid @enderror">
                    <option value="">-- Sélectionner un produit --</option>
                    @foreach($produits as $produit)
                    <option value="{{ $produit->id }}"
                        data-units-per-lot="{{ $produit->units_per_lot ?? 1 }}"
                        data-unit-price="{{ $produit->unit_price }}"
                        {{ old('produit_id', $vente->produit_id) == $produit->id ? 'selected' : '' }}>
                        {{ $produit->name }} ({{ $produit->category ?? '—' }})
                    </option>
                    @endforeach
                </select>
                @error('produit_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Type de vente</label>
                <select name="type_vente" id="type_vente" class="form-select @error('type_vente') is-invalid @enderror">
                    <option value="unite" {{ old('type_vente', $vente->type_vente) == 'unite' ? 'selected' : '' }}>Unité</option>
                    <option value="lot" {{ old('type_vente', $vente->type_vente) == 'lot' ? 'selected' : '' }}>Lot</option>
                </select>
                @error('type_vente')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Quantité vendue</label>
                <input type="number" name="quantite_vendue" id="quantite_vendue"
                    class="form-control @error('quantite_vendue') is-invalid @enderror"
                    value="{{ old('quantite_vendue', $vente->quantite_vendue) }}" min="1">
                @error('quantite_vendue')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Prix unitaire</label>
                <input type="number" step="0.01" name="prix_vente_unitaire" id="prix_vente_unitaire"
                    class="form-control @error('prix_vente_unitaire') is-invalid @enderror"
                    value="{{ old('prix_vente_unitaire', $vente->prix_vente_unitaire) }}">
                @error('prix_vente_unitaire')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Valeur totale</label>
                <input type="text" id="valeur_totale" class="form-control" readonly
                    value="{{ old('valeur_totale', $vente->valeur_totale) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Date de vente</label>
                <input type="date" name="date_vente"
                    class="form-control @error('date_vente') is-invalid @enderror"
                    value="{{ old('date_vente', $vente->date_vente->format('Y-m-d')) }}">
                @error('date_vente')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('ventes.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produitSelect = document.getElementById('produit_id');
        const typeVente = document.getElementById('type_vente');
        const quantiteInput = document.getElementById('quantite_vendue');
        const prixInput = document.getElementById('prix_vente_unitaire');
        const valeurTotale = document.getElementById('valeur_totale');

        function calculerTotal() {
            const quantite = parseFloat(quantiteInput.value) || 0;
            const prix = parseFloat(prixInput.value) || 0;
            const type = typeVente.value;
            const unitsPerLot = parseInt(produitSelect.selectedOptions[0]?.dataset.unitsPerLot || 1);

            let total = prix * quantite;
            valeurTotale.value = total.toFixed(2);
        }

        produitSelect.addEventListener('change', function() {
            const prix = produitSelect.selectedOptions[0]?.dataset.unitPrice || 0;
            prixInput.value = prix;
            calculerTotal();
        });

        typeVente.addEventListener('change', calculerTotal);
        quantiteInput.addEventListener('input', calculerTotal);
        prixInput.addEventListener('input', calculerTotal);

        // calcul initial
        calculerTotal();
    });
</script>
@endsection