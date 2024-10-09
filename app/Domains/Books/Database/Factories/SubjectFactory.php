<?php

namespace App\Domains\Books\Database\Factories;

use App\Domains\Books\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domains\Books\Models\Assunto>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Descricao' => fake()->text(20),
        ];
    }
}
