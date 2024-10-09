<?php

namespace App\Support\Domain\Repositories\Contracts;

/**
 * Interface DeleteRecords.
 */
interface DeleteRecords
{
    /**
     * Run the delete command model.
     * The goal is to enable the implementation of your business logic before the command.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete($id);
}
