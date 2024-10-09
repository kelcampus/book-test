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
        $books = Book::factory()->count(10)->create();

        foreach ($books as $book) {
            $authors = Author::factory()->count(2)->create();
            $subjects = Subject::factory()->count(2)->create();

            $book->authors()->attach($authors->pluck('CodAu'));
            $book->subjects()->attach($subjects->pluck('CodAs'));
        }
    }
}
