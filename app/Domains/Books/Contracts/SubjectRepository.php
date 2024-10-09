<?php

namespace App\Domains\Books\Contracts;

use App\Domains\Books\Models\Subject;
use App\Support\Domain\Repositories\Contracts\CrudRepository;

interface SubjectRepository extends CrudRepository
{
    public function hasAssociatedBooks(Subject $model): bool;
}
