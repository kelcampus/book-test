<?php

namespace App\Support\Domain\Repositories\Operations;

trait ReadRecords
{
    public function getAll($take = false, bool $paginate = false, array $orderBy = null, $columns = ['*'])
    {
        // Inicializa a query builder com as colunas especificadas
        $query = $this->model::select($columns);

        // Aplica a ordenação, se fornecida
        if ($orderBy) {
            if (is_array($orderBy)) {
                $query->orderBy($orderBy[0], $orderBy[1] ?? 'asc');
            } else {
                $query->orderBy($orderBy);
            }
        }

        // Verifica se deve paginar ou limitar os resultados
        if ($paginate) {
            return $query->paginate($take ?: null); // Pagina com 'take' ou usa o valor padrão de paginação
        }

        if ($take) {
            return $query->limit($take)->get(); // Limita os resultados se 'take' for maior que 0
        }

        return $query->get(); // Retorna todos os registros
    }

    public function findByID($id, bool $fail = true)
    {
        if ($fail) {
            return $this->model::findOrFail($id);
        }

        return $this->model::find($id);
    }
}
