@extends('layouts.master')

@section('title', 'Inicio')
@section('header_title', 'Añadir película / Buscar actores por década')
@section('header_subtitle', 'Gestiona películas o filtra actores por década')

@section('content')

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- FORMULARIO AÑADIR PELÍCULA -->
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <h5 class="mb-3">Añadir nueva película</h5>

        <form action="{{ route('film') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la película" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="year">Año</label>
                    <input type="number" class="form-control" id="year" name="year" placeholder="Año de estreno" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="genre">Género</label>
                    <input type="text" class="form-control" id="genre" name="genre" placeholder="Género de la película" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="country">País</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="País de origen" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="img_url">Imagen (URL)</label>
                    <input type="text" class="form-control" id="img_url" name="img_url" placeholder="https://..." required>
                    <small class="form-text text-muted">Pega una URL válida para mostrar el póster.</small>
                </div>

                <div class="form-group col-md-4">
                    <label for="duration">Duración (min)</label>
                    <input type="number" class="form-control" id="duration" name="duration" placeholder="Ej: 120" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary px-4">
                    Guardar película
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SELECT ACTORES POR DÉCADA -->
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="mb-3">Buscar actores por década</h5>

        <form method="GET" id="decadeForm">
            <div class="form-group">
                <label for="decade" class="font-weight-bold">Selecciona una década</label>
                <select class="form-control form-control-lg" id="decade" name="decade" required>
                    <option value="" disabled selected>Elige una década...</option>
                    @for ($year = 1950; $year <= 2020; $year += 10)
                        <option value="{{ $year }}">
                            {{ $year }}-{{ $year + 9 }}
                        </option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-dark btn-block btn-lg">
                Ver actores
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('decadeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const decade = document.getElementById('decade').value;
    if (decade) {
        window.location.href = "{{ url('/actorout/actors/decade') }}/" + decade;
    }
});
</script>

@endsection
