<?php

namespace App\Domains\Books\Repositories;

use App\Domains\Books\Contracts\AuthorSummaryRepository as AuthorSummaryRepositoryContract;
use App\Domains\Books\Models\AuthorSummaryDatabaseView;
use App\Support\Domain\Repositories\ReadRepository;

class AuthorSummaryRepository extends ReadRepository implements AuthorSummaryRepositoryContract
{
    protected $model = AuthorSummaryDatabaseView::class;
}
