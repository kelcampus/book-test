<?php

namespace App\Units\Books\Http\Requests;

use App\Support\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'Titulo' => 'required|string|min:2|max:40',
            'Editora' => 'required|string|min:2|max:40',
            'Edicao' => 'required|integer|min:1',
            'AnoPublicacao' => 'required|string|size:4|regex:/^[0-9]{4}$/',
            'Valor' => 'required|numeric|min:0|max:99999999.99',
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:Autor,CodAu',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:Assunto,CodAs',
        ];
    }
}
