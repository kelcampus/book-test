<?php

namespace App\Support\Domain\Repositories\Operations;

trait UpdateRecords
{
    public function update($id, array $data = []): bool
    {
        $data = $this->fill($data);

        // Perform the update using the class name and filtered data
        return $this->model::where($this->model->getKeyName(), $id)->update($data);
    }

    private function fill(array $data)
    {
        // Determine if $this->model is a string (class name) or an instance
        $modelClass = is_string($this->model) ? $this->model : get_class($this->model);

        // Create a new instance of the model to get fillable fields
        $modelInstance = new $modelClass;

        // @@@ melhorar isso aqui
        $this->model = $modelInstance;

        // Get the fillable fields
        $fillableFields = $modelInstance->getFillable();

        // Filter the data to only include fillable fields
        $filteredData = array_intersect_key($data, array_flip($fillableFields));

        return $filteredData;
    }

}
