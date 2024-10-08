<?php

namespace App\Domains\Books\Models;

use App\Domains\Books\Database\Factories\AssuntoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
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

    public function livros()
    {
        // Define a relação muitos para muitos
        return $this->belongsToMany(Livro::class, 'Livro_Assunto', 'Assunto_CodAs', 'Livro_Codl');
    }

    protected static function newFactory(): AssuntoFactory
    {
        return AssuntoFactory::new();
    }
}
