<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nom = $this->faker->sentence(3);
        return [
            'titre' => $nom,
            'slug' => Str::slug($nom),
            'image' => 'https://fakeimg.pl/263x299/?text=263x299',
            'description' => $this->faker->paragraph,
        ];
    }
}
