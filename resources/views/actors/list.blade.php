@extends('layouts.master') @section('title', 'Listado de actores') @section('header_title', $title) @section('header_subtitle',
'Listado con información básica de actores') @section('content') @if ($actors->isEmpty())
    <div class="alert alert-warning text-center mb-0" role="alert">
        <h5 class="mb-2">No se ha encontrado ningún actor</h5>
        <p class="mb-0 text-muted">Prueba otra sección o añade un nuevo actor.</p>
    </div>
@else
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Nombre</th>
                    <th>Fecha de nacimiento</th>
                    <th>País</th>
                    <th>Salario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actors as $actor)
                    <tr class="text-center align-middle">
                        <td class="text-left font-weight-bold">{{ $actor->name }}</td>
                        <td>{{ $actor->birth_date }}</td>
                        <td>{{ $actor->country }}</td>
                        <td> <span class="badge badge-info"> {{ $actor->salary }} </span> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif @endsection
