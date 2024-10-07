<?php

namespace App\Support\Domain\Repositories\Contracts;

use App\Support\Domain\Repositories\Contracts\CreateRecords as CreateRecordsContract;
use App\Support\Domain\Repositories\Contracts\UpdateRecords as UpdateRecordsContract;
use App\Support\Domain\Repositories\Contracts\ReadRecords as ReadRecordsContract;
use App\Support\Domain\Repositories\Contracts\DeleteRecords as DeleteRecordsContract;

interface CrudRepository extends CreateRecordsContract,
                                ReadRecordsContract,
                                UpdateRecordsContract,
                                DeleteRecordsContract

{

}
