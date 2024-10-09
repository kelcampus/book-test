<?php

namespace App\Support\Domain\Repositories\Contracts;

/**
 * Interface UpdateRecords.
 */
interface UpdateRecords
{
    /**
     * Updated model data, using $data
     * The sequence performs the Model update.
     *
     * @param int $id
     * @param array $data
     */
    public function update($id, array $data = []):bool ;
}
