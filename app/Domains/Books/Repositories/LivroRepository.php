<?php

namespace App\Domains\Books\Repositories;

use App\Domains\Books\Models\Livro;
use App\Domains\Books\Contracts\LivroRepository as LivroRepositoryContract;
use App\Support\Domain\Repositories\CrudRepository;

class LivroRepository extends CrudRepository implements LivroRepositoryContract
{
    protected $model = Livro::class;
}
