<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies')</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="container py-4">

    <header class="mb-4">

        <div class="d-flex align-items-center mb-3">
            <img
                src="{{ asset('img/header.jpg') }}"
                alt="Logo Movies"
                style="height: 60px;"
                class="mr-3"
            >
            <h1 class="mb-0">Lista de Películas</h1>
        </div>

        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/oldFilms">Pelis antiguas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/newFilms">Pelis nuevas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/films">Pelis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmout/countFilms">Contar películas</a>
                </li>
            </ul>
        </nav>

    </header>

    @yield('content')

    <footer class="mt-5 text-center text-muted">
        <small>© {{ date('Y') }} Movies App</small>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
