@extends('layouts.master')

@section('title', 'Listado de películas')
@section('header_title', $title)
@section('header_subtitle', 'Listado con información básica y póster')

@section('content')

@if(empty($films))
    <div class="alert alert-warning text-center mb-0" role="alert">
        <h5 class="mb-2">No se ha encontrado ninguna película</h5>
        <p class="mb-0 text-muted">Prueba otra sección o añade una nueva película.</p>
    </div>
@else
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Nombre</th>
                    <th>Año</th>
                    <th>Duración</th>
                    <th>País</th>
                    <th>Género</th>
                    <th>Imagen</th>
                </tr>
            </thead>

            <tbody>
                @foreach($films as $film)
                    <tr class="text-center align-middle">
                        <td class="text-left font-weight-bold">{{ $film['name'] }}</td>
                        <td>{{ $film['year'] }}</td>
                        <td>
                            <span class="badge badge-info">
                                {{ $film['duration'] }} min
                            </span>
                        </td>
                        <td>{{ $film['country'] }}</td>
                        <td>
                            <span class="badge badge-secondary">
                                {{ $film['genre'] }}
                            </span>
                        </td>
                        <td>
                            <img
                                src="{{ $film['img_url'] }}"
                                alt="Póster de {{ $film['name'] }}"
                                class="rounded shadow-sm"
                                style="width:70px; height:90px; object-fit:cover;"
                            >
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection
