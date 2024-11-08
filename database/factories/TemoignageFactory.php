<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Temoignage>
 */
class TemoignageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->sentence(3),
            'poste' => $this->faker->sentence(2),
            'photo' => 'https://fakeimg.pl/200x200/?text=200x200',
            'note' => 3,
            'message' => $this->faker->paragraph,
        ];
    }
}
