<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockManager - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionnel : Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Vos styles personnalisés -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('logo.png') }}?v={{ time() }}" type="image/png">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #0d6efd;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">StockManager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Liens -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('produits.index') }}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('stock_initials.index') }}">Stock Initial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('ventes.index') }}">Ventes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('reapprovisionnements.index') }}">Réapprovisionnement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('avaries.index') }}">Avaries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('depenses.index') }}">Dépenses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('resume.index') }}">Résumé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('vente.recap') }}">Récap Ventes</a>
                    </li>
                </ul>

                <!-- Utilisateur -->
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fa fa-sign-out-alt me-1"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login.form') }}">
                            <i class="fa fa-sign-in-alt me-1"></i> Connexion
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-3 mt-auto border-top">
        &copy; {{ date('Y') }} StockManager. Tous droits réservés.
    </footer>

    <!-- Bootstrap 5 JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>