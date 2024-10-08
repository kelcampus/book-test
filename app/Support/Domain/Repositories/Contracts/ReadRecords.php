<?php

namespace App\Support\Domain\Repositories\Contracts;

/**
 * Interface ReadRecords.
 */
interface ReadRecords
{

    /**
     * Retrieve all records with optional pagination, limiting, column selection, and ordering.
     *
     * @param int|bool $take The number of records to take. If false, retrieves all records without limiting.
     * @param bool $paginate Whether to paginate the results. If true, paginates with the given $take value or default pagination size.
     * @param string|array|null $orderBy The column to order by. Can be a string for simple order or an array ['column', 'direction'].
     * @param array $columns The columns to select. Defaults to ['*'] to select all columns.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator A collection of records or a paginated result.
     */
    public function getAll($take = false, bool $paginate = false, array $orderBy = null, $columns = ['*']);

    /**
     * Retrieves a record by his id
     * If fail is true $ fires ModelNotFoundException.
     *
     * @param int  $id
     * @param bool $fail
     *
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findByID($id, bool $fail = true);

}
