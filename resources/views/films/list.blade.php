@extends('layouts.master')

@section('title', 'Listado de películas')

@section('content')

<h1 style="text-align:center; margin-bottom:20px;">
    {{ $title }}
</h1>

@if(empty($films))
<p style="color:red; text-align:center; font-size:18px;">
    No se ha encontrado ninguna película
</p>
@else
<div style="display:flex; justify-content:center; margin-top:20px;">
    <table style="border-collapse:collapse; min-width:70%; font-size:14px;">
        <tr style="background:#f2f2f2;">
            @foreach($films as $film)
            @foreach(array_keys($film) as $key)
            <th style="border:1px solid #ccc; padding:8px;">
                {{ $key === 'img_url' ? 'Imagen' : ucfirst($key) }}
            </th>
            @endforeach
            @break
            @endforeach
        </tr>

        @foreach($films as $film)
        <tr style="text-align:center;">
            <td style="border:1px solid #ccc; padding:8px;">{{ $film['name'] }}</td>
            <td style="border:1px solid #ccc; padding:8px;">{{ $film['year'] }}</td>
            <td style="border:1px solid #ccc; padding:8px;">{{ $film['duration'] }}</td>
            <td style="border:1px solid #ccc; padding:8px;">{{ $film['country'] }}</td>
            <td style="border:1px solid #ccc; padding:8px;">{{ $film['genre'] }}</td>
            <td style="border:1px solid #ccc; padding:8px;">
                <img src="{{ $film['img_url'] }}"
                    style="width:100px; height:120px; object-fit:cover; border-radius:6px;">
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif

@endsection