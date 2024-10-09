<?php

namespace App\Domains\Books\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model representa uma view do banco de dados.
 *
 * @see Database/Migrations/2024_10_08_211409_create_livro_visao_geral_view.php
 */
class AuthorSummaryDatabaseView extends Model
{
    use HasFactory;

    protected $table = 'autores_visao_geral';

    public $timestamps = false;

    protected $primaryKey = 'Codl';

    public $incrementing = false;

    protected $keyType = 'int';

    /**
     * Get the formatted value of the book.
     *
     * @return string
     */
    public function formattedValor(): string
    {
        return number_format($this->Valor, 2, ',', '.');
    }
}
