<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorFilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = DB::table('films')->pluck('id');
        $actors = DB::table('actors')->pluck('id');

        foreach ($films as $filmId) {
            $actorsForFilm = $actors->random(rand(1, 4));

            foreach ($actorsForFilm as $actorId) {
                DB::table('actor_film')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
