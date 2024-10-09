<?php

namespace App\Domains\Books\Database\Factories;

use App\Domains\Books\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domains\Books\Models\Livro>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Titulo' => fake()->name(40),
            'Editora' => fake()->company(40),
            'Edicao' => fake()->numberBetween(1, 10),
            'AnoPublicacao' => fake()->year,
            'Valor' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
