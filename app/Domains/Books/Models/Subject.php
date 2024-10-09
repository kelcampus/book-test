<?php

namespace App\Domains\Books\Models;

use App\Domains\Books\Database\Factories\SubjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'Assunto';

    public $timestamps = false;

    protected $primaryKey = 'CodAs';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'Descricao'
    ];

    public function books()
    {
        // Define a relação muitos para muitos
        return $this->belongsToMany(Book::class, 'Livro_Assunto', 'Assunto_CodAs', 'Livro_Codl');
    }

    protected static function newFactory(): SubjectFactory
    {
        return SubjectFactory::new();
    }
}
