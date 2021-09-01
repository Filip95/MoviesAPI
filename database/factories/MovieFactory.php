<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'title' => $this->faker->realText($maxNbChars = 10),
           'director'=> $this->faker->name(),
           'imageUrl' => $this->faker->url(),
           'duration' => $this->faker->numberBetween($min=15,$max=150),
           'releaseDate'=> $this->faker->date(),
           'genre' => $this->faker->tld(),//
        ];
    }
}
