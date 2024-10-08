<?php

namespace App\Domains\Books\Database\Factories;

use App\Domains\Books\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domains\Books\Models\Livro>
 */
class LivroFactory extends Factory
{
    protected $model = Livro::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Titulo' => fake()->sentence(3), // Generates a random title
            'Editora' => fake()->company, // Generates a random publisher name
            'Edicao' => fake()->numberBetween(1, 10), // Random edition number
            'AnoPublicacao' => fake()->year, // Generates a random year
            'Valor' => fake()->randomFloat(2, 10, 100), // Generates a random price between 10 and 100
        ];
    }
}
