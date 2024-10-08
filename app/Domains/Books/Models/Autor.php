<?php

namespace App\Domains\Books\Models;

use App\Domains\Books\Database\Factories\AutorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'Autor';

    public $timestamps = false;

    protected $primaryKey = 'CodAu';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'Nome'
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'Livro_Autor', 'Autor_CodAu', 'Livro_Codl');
    }

    protected static function newFactory(): AutorFactory
    {
        return AutorFactory::new();
    }
}
