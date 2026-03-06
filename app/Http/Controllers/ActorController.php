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

    public function listActorsByDecade($year = null)
    {
        if (is_null($year)) {
            return redirect()->route('actors');
        }

        $startYear = (int) $year;
        $endYear = $startYear + 9;

        $actors = Actor::whereBetween('birth_date', [
            $startYear . '-01-01',
            $endYear . '-12-31'
        ])->get();

        return view('actors.list', [
            'actors' => $actors,
            'title' => "Actors born between $startYear-$endYear"
        ]);
    }
    public function countActors()
{
    $count = Actor::count();

    return view('actors.count', [
        'count' => $count
    ]);
}
}