<?php

namespace App\Domains\Books\Database\Factories;

use App\Domains\Books\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domains\Books\Models\Autor>
 */
class AutorFactory extends Factory
{
    protected $model = Autor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nome' => fake()->name,
        ];
    }
}
