@extends('layouts.master')

@section('title', 'Contar películas')
@section('header_title', 'Estadísticas')
@section('header_subtitle', 'Número total de películas registradas')

@section('content')

@if($count == 0)

    <div class="alert alert-warning text-center">
        <h5 class="mb-2">No se ha encontrado ninguna película</h5>
        <p class="mb-0 text-muted">Añade una nueva película desde el menú principal.</p>
    </div>

@else

    <div class="text-center">
        <div class="display-4 font-weight-bold text-primary">
            {{ $count }}
        </div>
        <p class="lead text-muted mb-0">
            películas registradas en el sistema
        </p>
    </div>

@endif

@endsection
