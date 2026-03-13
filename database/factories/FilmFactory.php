<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->sentence(3),
            'year' => fake()->numberBetween(1980, 2024),
            'genre' => fake()->randomElement([
                'Action',
                'Drama',
                'Comedy',
                'Horror',
                'Fiction',
            ]),
            'img_url' => fake()->imageUrl(300, 450, 'movie'),
            'duration' => fake()->numberBetween(61, 210),
            'country' => fake()->country(),
        ];
    }
}
