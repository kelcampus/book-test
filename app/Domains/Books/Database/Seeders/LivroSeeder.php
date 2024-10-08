<?php

namespace App\Domains\Books\Database\Seeders;

use App\Domains\Books\Models\Assunto;
use App\Domains\Books\Models\Autor;
use App\Domains\Books\Models\Livro;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LivroSeeder extends Seeder
{
    /**'
     * Seed the application's database.
     */
    public function run(): void
    {
        $livros = Livro::factory()->count(10)->create();

        // Attach random autores and assuntos to each livro
        foreach ($livros as $livro) {
            $autores = Autor::factory()->count(2)->create(); // Create 2 random autores
            $assuntos = Assunto::factory()->count(2)->create(); // Create 2 random assuntos

            // Attach to the livro using the pivot tables
            $livro->autores()->attach($autores->pluck('CodAu'));
            $livro->assuntos()->attach($assuntos->pluck('CodAs'));
        }
    }
}
