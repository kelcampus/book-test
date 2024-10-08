<?php

namespace App\Domains\Books\Repositories;

use App\Domains\Books\Models\Author;
use App\Domains\Books\Contracts\AuthorRepository as AuthorRepositoryContract;
use App\Support\Domain\Repositories\CrudRepository;

class AuthorRepository extends CrudRepository implements AuthorRepositoryContract
{
    protected $model = Author::class;
}
