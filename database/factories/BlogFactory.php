<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence,
            'photo' => 'https://fakeimg.pl/420x283/?text=420x283',
            'photos' => 'https://fakeimg.pl/420x283/?text=420x283',
            'description' => $this->faker->paragraph,
        ];
    }
}
