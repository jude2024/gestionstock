@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body p-5">
                <h3 class="text-center mb-4 fw-bold text-primary">
                    <i class="fa fa-user-lock me-2"></i> Connexion
                </h3>

                {{-- Message succès --}}
                @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                {{-- Erreurs --}}
                @if($errors->any())
                <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                            autofocus>
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Mot de passe --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required>
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Bouton --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary fw-bold">
                            <i class="fa fa-sign-in-alt me-1"></i> Se connecter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Texte bas --}}
        <p class="text-center text-muted mt-3">
            © {{ date('Y') }} StockManager
        </p>
    </div>
</div>
@endsection