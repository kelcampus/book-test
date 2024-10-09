<?php

namespace App\Domains\Books\Models;

use App\Domains\Books\Database\Factories\AuthorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
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

    public function books()
    {
        return $this->belongsToMany(Book::class, 'Livro_Autor', 'Autor_CodAu', 'Livro_Codl');
    }

    protected static function newFactory(): AuthorFactory
    {
        return AuthorFactory::new();
    }
}
