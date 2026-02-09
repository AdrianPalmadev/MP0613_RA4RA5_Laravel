<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
 
class FilmFakerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
 
        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->numberBetween(1980, 2024),
                'genre' => $faker->randomElement([
                    'Action',
                    'Drama',
                    'Comedy',
                    'Horror',
                    'Fiction'
                ]),
                'country' => $faker->country,
                'duration' => $faker->numberBetween(80, 180),
                'img_url' => $faker->imageUrl(300, 450, 'movie'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
 
 