@extends('layouts.master')

@section('title', 'Contar actores')
@section('header_title', 'Estadísticas')
@section('header_subtitle', 'Número total de actores registrados')

@section('content')

@if($count == 0)

    <div class="alert alert-warning text-center">
        <h5 class="mb-2">No se ha encontrado ningún actor</h5>
        <p class="mb-0 text-muted">Añade un nuevo actor desde el menú principal.</p>
    </div>

@else

    <div class="text-center">
        <div class="display-4 font-weight-bold text-primary">
            {{ $count }}
        </div>
        <p class="lead text-muted mb-0">
            actores registrados en el sistema
        </p>
    </div>

@endif

@endsection