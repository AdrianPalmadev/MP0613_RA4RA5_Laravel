<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Film;
use Illuminate\Database\Seeder;

class ActorFilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = Film::all();
        $actors = Actor::all();

        foreach ($films as $film) {
            $actorsForFilm = $actors->random(rand(1, min(4, $actors->count())));

            $film->actors()->syncWithoutDetaching($actorsForFilm->pluck('id')->all());
        }
    }
}
