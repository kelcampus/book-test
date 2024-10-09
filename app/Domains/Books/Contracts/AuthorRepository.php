<?php

namespace App\Domains\Books\Contracts;

use App\Domains\Books\Models\Author;
use App\Support\Domain\Repositories\Contracts\CrudRepository;

interface AuthorRepository extends CrudRepository
{
    public function hasAssociatedBooks(Author $model): bool;
}
