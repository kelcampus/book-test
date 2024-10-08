<?php

namespace App\Domains\Books\Repositories;

use App\Domains\Books\Models\Assunto;
use App\Domains\Books\Contracts\AssuntoRepository as AssuntoRepositoryContract;
use App\Support\Domain\Repositories\CrudRepository;

class AssuntoRepository extends CrudRepository implements AssuntoRepositoryContract
{
    protected $model = Assunto::class;
}
