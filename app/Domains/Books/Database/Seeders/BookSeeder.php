<?php

namespace App\Domains\Books\Database\Seeders;

use App\Domains\Books\Models\Subject;
use App\Domains\Books\Models\Author;
use App\Domains\Books\Models\Book;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**'
     * Seed the application's database.
     */
    public function run(): void
    {
        $livros = Book::factory()->count(10)->create();

        // Attach random authors and subjects to each livro
        foreach ($livros as $livro) {
            $authors = Author::factory()->count(2)->create(); // Create 2 random authors
            $subjects = Subject::factory()->count(2)->create(); // Create 2 random subjects

            // Attach to the livro using the pivot tables
            $livro->authors()->attach($authors->pluck('CodAu'));
            $livro->subjects()->attach($subjects->pluck('CodAs'));
        }
    }
}
