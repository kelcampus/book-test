<?php

namespace App\Domains\Books\Models;

use App\Domains\Books\Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
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

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'Livro_Autor', 'Livro_Codl', 'Autor_CodAu');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'Livro_Assunto', 'Livro_Codl', 'Assunto_CodAs');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): BookFactory
    {
        return BookFactory::new();
    }
}
