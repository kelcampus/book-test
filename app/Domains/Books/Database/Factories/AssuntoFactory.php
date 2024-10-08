<?php

namespace App\Domains\Books\Database\Factories;

use App\Domains\Books\Models\Assunto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domains\Books\Models\Assunto>
 */
class AssuntoFactory extends Factory
{
    protected $model = Assunto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Descricao' => fake()->sentence(3),
        ];
    }
}
