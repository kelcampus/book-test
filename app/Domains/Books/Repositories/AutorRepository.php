<?php

namespace App\Domains\Books\Repositories;

use App\Domains\Books\Models\Autor;
use App\Domains\Books\Contracts\AutorRepository as AutorRepositoryContract;
use App\Support\Domain\Repositories\CrudRepository;

class AutorRepository extends CrudRepository implements AutorRepositoryContract
{
    protected $model = Autor::class;
}
