@extends('layouts.master')

@section('title', 'Inicio')

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card p-4 mx-auto" style="max-width: 800px;">
    <form action="{{ route('film') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Nombre de la película" required>
            </div>

            <div class="form-group col-md-6">
                <label for="year">Año</label>
                <input type="number" class="form-control" id="year" name="year"
                       placeholder="Año de estreno" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="genre">Género</label>
                <input type="text" class="form-control" id="genre" name="genre"
                       placeholder="Género de la película" required>
            </div>

            <div class="form-group col-md-6">
                <label for="img_url">Imagen</label>
                <input type="text" class="form-control" id="img_url" name="img_url"
                       placeholder="URL de la imagen" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="duration">Duración (minutos)</label>
                <input type="number" class="form-control" id="duration" name="duration"
                       placeholder="Duración en minutos" required>
            </div>

            <div class="form-group col-md-6">
                <label for="country">País</label>
                <input type="text" class="form-control" id="country" name="country"
                       placeholder="País de origen" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-3">
            Guardar película
        </button>
    </form>
</div>

@endsection
