<?php

namespace App\Domains\Books\Repositories;

use App\Domains\Books\Models\Book;
use App\Domains\Books\Contracts\BookRepository as BookRepositoryContract;
use App\Support\Domain\Repositories\CrudRepository;

class BookRepository extends CrudRepository implements BookRepositoryContract
{
    protected $model = Book::class;

    public function syncAuthors(Book $book, array $authorIds)
    {
        $book->authors()->sync($authorIds);
    }

    // public function detachAuthors(Book $book)
    // {
    //     $book->authors()->detach();
    // }
}
