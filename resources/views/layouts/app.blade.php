<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portail d'administration des étudiants - Collège de Maisonneuve">
    <title>@yield('title', 'Portail Étudiants - Maisonneuve')</title>

    <!-- Favicon simplifié -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🏫</text></svg>">

    <!-- Bootstrap CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex flex-column h-100 bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('students.index') }}">
                <i class="bi bi-building me-2"></i>
                Collège Maisonneuve
                <span class="badge bg-light text-primary ms-2">2395866</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-1">
                        <a href="{{ route('students.index') }}" class="nav-link px-3 py-2 rounded hover-bg-light hover-bg-opacity-10">
                            <i class="bi bi-people-fill me-1"></i> Étudiants
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="{{ route('students.create') }}" class="nav-link px-3 py-2 rounded hover-bg-light hover-bg-opacity-10">
                            <i class="bi bi-plus-circle me-1"></i> Créer
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="{{ route('city.index') }}" class="nav-link px-3 py-2 rounded hover-bg-light hover-bg-opacity-10">
                            <i class="bi bi-geo-alt-fill me-1"></i> Villes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="container my-4 flex-grow-1">
        @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </main>

    <!-- Pied de Page -->
    <footer class="bg-primary text-white py-3 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Collège de Maisonneuve</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-white text-opacity-75">Portail administratif</p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>