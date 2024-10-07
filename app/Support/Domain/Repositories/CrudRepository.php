<?php

namespace App\Support\Domain\Repositories;

use App\Support\Domain\Repositories\Contracts\CrudRepository as CrudRepositoryContract;
use App\Support\Domain\Repositories\Operations\CreateRecords;
use App\Support\Domain\Repositories\Operations\UpdateRecords;
use App\Support\Domain\Repositories\Operations\ReadRecords;
use App\Support\Domain\Repositories\Operations\DeleteRecords;

abstract class CrudRepository extends Repository implements CrudRepositoryContract
{
    use CreateRecords;
    use UpdateRecords;
    use ReadRecords;
    use DeleteRecords;
}
