<?php

namespace App\Domains\Books\Repositories;

use App\Domains\Books\Models\Subject;
use App\Domains\Books\Contracts\SubjectRepository as SubjectRepositoryContract;
use App\Support\Domain\Repositories\CrudRepository;

class SubjectRepository extends CrudRepository implements SubjectRepositoryContract
{
    protected $model = Subject::class;

    public function hasAssociatedBooks(Subject $model): bool
    {
        $model->load('books');
        return $model->books()->count() > 0;
    }
}
