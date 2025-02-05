<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projet>
 */
class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nom = $this->faker->words(3, true);
        return [
            'nom' => $nom,
            'slug' => Str::slug($nom), 
            'photo' => 'https://fakeimg.pl/360x244/?text=360x244', // Image principale
            'photos' => json_encode([
                'https://fakeimg.pl/360x244/?text=360x244',
                'https://fakeimg.pl/360x244/?text=360x244',
                'https://fakeimg.pl/360x244/?text=360x244'
            ]), // Array JSON d'images supplémentaires
            'description' => $this->faker->paragraph,
        ];
    }
}
