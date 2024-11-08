<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'titre' => $this->faker->sentence(3),
            'image' => 'https://fakeimg.pl/263x299/?text=263x299',
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['Type A', 'Type B', 'Type C']),
        ];
    }
}
