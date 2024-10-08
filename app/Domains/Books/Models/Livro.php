<?php

namespace App\Domains\Books\Models;

use App\Domains\Books\Database\Factories\LivroFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'Livro';

    public $timestamps = false;

    protected $primaryKey = 'Codl';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'Titulo',
        'Editora',
        'Edicao',
        'AnoPublicacao',
        'Valor'
    ];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'Livro_Autor', 'Livro_Codl', 'Autor_CodAu');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'Livro_Assunto', 'Livro_Codl', 'Assunto_CodAs');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): LivroFactory
    {
        return LivroFactory::new();
    }
}
