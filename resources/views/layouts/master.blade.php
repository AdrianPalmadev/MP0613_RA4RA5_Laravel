<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        /* Dropdown animado (solo escritorio) */
        @media (min-width: 992px) {

            .navbar .dropdown-menu {
                display: block;
                opacity: 0;
                transform: translateY(-10px);
                transition: all 0.25s ease;
                pointer-events: none;
            }

            .navbar .dropdown:hover .dropdown-menu {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
            }
        }

        /* Animación escritura para items del dropdown */
        .dropdown-menu .dropdown-item {
            opacity: 0;
            transform: translateX(-10px);
            animation: slideTyping 0.4s ease forwards;
        }

        /* Retraso progresivo para cada item */
        .dropdown-menu .dropdown-item:nth-child(1) { animation-delay: 0.05s; }
        .dropdown-menu .dropdown-item:nth-child(2) { animation-delay: 0.1s; }
        .dropdown-menu .dropdown-item:nth-child(3) { animation-delay: 0.15s; }
        .dropdown-menu .dropdown-item:nth-child(4) { animation-delay: 0.2s; }
        .dropdown-menu .dropdown-item:nth-child(5) { animation-delay: 0.25s; }

        @keyframes slideTyping {
            from {
                opacity: 0;
                transform: translateX(-15px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
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

                <!-- Dropdown Películas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('filmout/*') ? 'active' : '' }}"
                       href="#" id="moviesDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Películas
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moviesDropdown">
                        <a class="dropdown-item {{ request()->is('filmout/oldFilms*') ? 'active' : '' }}" href="/filmout/oldFilms">Pelis antiguas</a>
                        <a class="dropdown-item {{ request()->is('filmout/newFilms*') ? 'active' : '' }}" href="/filmout/newFilms">Pelis nuevas</a>
                        <a class="dropdown-item {{ request()->is('filmout/films*') ? 'active' : '' }}" href="/filmout/films">Pelis</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item {{ request()->is('filmout/countFilms*') ? 'active' : '' }}" href="/filmout/countFilms">Contar películas</a>
                    </div>
                </li>

                <!-- Dropdown Actores -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('actorout/*') ? 'active' : '' }}"
                       href="#" id="actorsDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actores
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actorsDropdown">
                        <a class="dropdown-item {{ request()->is('actorout/actors*') ? 'active' : '' }}" href="/actorout/actors">
                            List actors
                        </a>
                        <a class="dropdown-item" href="/actorout/actors/decade">List actors by decade</a>

                        <div class="dropdown-divider"></div>

                        <!-- Activa cuando implementes las rutas -->
                        <!--
                        <a class="dropdown-item" href="/actorout/countActors">FR3 - Count actors</a>
                        <a class="dropdown-item" href="/actorout/deleteActor">FR4 - Delete actor</a>
                        -->
                    </div>
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

            @if(View::hasSection('header_action'))
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
            <small>© {{ date('Y') }} Movies App - Adrián Palma</small>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html> 