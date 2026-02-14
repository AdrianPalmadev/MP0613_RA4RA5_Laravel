<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/header.jpg') }}" alt="Logo Movies" style="height: 34px;" class="mr-2 rounded">
            <span>Movies</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('filmout/oldFilms') ? 'active' : '' }}" href="/filmout/oldFilms">Pelis antiguas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('filmout/newFilms') ? 'active' : '' }}" href="/filmout/newFilms">Pelis nuevas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('filmout/films') ? 'active' : '' }}" href="/filmout/films">Pelis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('filmout/countFilms') ? 'active' : '' }}" href="/filmout/countFilms">Contar películas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h1 class="h3 mb-1">@yield('header_title', 'Lista de Películas')</h1>
                <p class="text-muted mb-0">@yield('header_subtitle', 'Gestiona y consulta el catálogo')</p>
            </div>

            @hasSection('header_action')
                <div>
                    @yield('header_action')
                </div>
            @endif
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                @yield('content')
            </div>
        </div>

        <footer class="mt-4 text-center text-muted">
            <small>© {{ date('Y') }} Movies App</small>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
