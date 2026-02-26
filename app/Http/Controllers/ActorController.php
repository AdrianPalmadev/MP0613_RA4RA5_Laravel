<?php

namespace App\Http\Controllers;

use App\Models\Actor;

class ActorController extends Controller
{
    public function listActors()
    {
        $actors = Actor::all();

        return view('actors.list', [
            'actors' => $actors,
            'title' => 'Listado de Actores'
        ]);
    }
}