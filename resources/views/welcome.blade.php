@extends('layouts.master')

@section('title', 'Inicio')
@section('header_title', 'Añadir película')
@section('header_subtitle', 'Rellena los datos y guarda en el catálogo')

@section('content')

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

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

@endsection
