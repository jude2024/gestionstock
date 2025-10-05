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

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top" style="background-color: #0d6efd;">
        <div class="container-fluid">
            <!-- Logo / Nom -->
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="fa fa-boxes me-1"></i> StockManager
            </a>

            <!-- Burger menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Liens principaux -->
                <ul class="navbar-nav mb-2 mb-lg-0 justify-content-center w-100">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}"><i class="fa fa-chart-line me-1"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('produits.index') }}"><i class="fa fa-box me-1"></i> Produits</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('ventes.index') }}"><i class="fa fa-shopping-cart me-1"></i> Ventes</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('reapprovisionnements.index') }}"><i class="fa fa-truck me-1"></i> Réapprovisionnement</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('avaries.index') }}"><i class="fa fa-ban me-1"></i> Avaries</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('depenses.index') }}"><i class="fa fa-wallet me-1"></i> Dépenses</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('resume.index') }}"><i class="fa fa-clipboard-list me-1"></i> Résumé</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('vente.recap') }}"><i class="fa fa-receipt me-1"></i> Récap Ventes</a></li>
                    <!-- <li class="nav-item"><a class="nav-link text-white" href="{{ route('stock_initials.index') }}"><i class="fa fa-cubes me-1"></i> Stock Initial</a></li> -->

                </ul>

                <!-- Utilisateur -->
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                            id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle me-1"></i>
                            <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
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
    <main class="flex-grow-1 py-4 container-fluid">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-3 mt-auto border-top small">
        &copy; {{ date('Y') }} <strong>StockManager</strong>. Tous droits réservés.
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>