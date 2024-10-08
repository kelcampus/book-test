<?php

namespace App\Domains\Books\Contracts;

use App\Domains\Books\Models\Book;
use App\Support\Domain\Repositories\Contracts\CrudRepository;

interface BookRepository extends CrudRepository
{
    public function syncAuthors(Book $book, array $authorIds);

    public function syncSubjects(Book $book, array $subjectIds);

    //public function detachAuthors(Book $book);
}
