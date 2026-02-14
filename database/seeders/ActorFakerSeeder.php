<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('actors')->insert([
                'name' => $faker->name,
                'birth_date' => $faker->date(),
                'country' => $faker->country,
                'salary' => $faker->numberBetween(10000, 50000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
