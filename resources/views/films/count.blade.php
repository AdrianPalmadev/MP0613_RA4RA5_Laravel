@extends('layouts.master')

@section('title', 'Contar películas')

@section('content')
@if($count == 0)
<p style="color:red; text-align:center; font-size:18px;">
    No se ha encontrado ninguna película
</p>
@else
<p style="text-align:center;">
    Hay {{ $count }} películas.
</p>
@endif
@endsection