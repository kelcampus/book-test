<?php

namespace App\Units\Books\Http\Requests;

use App\Support\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()
    {
        $currentBook = $this->route('book');
        $bookId = null === $currentBook ? null : $currentBook->Codl;

        return [
            'Titulo' => 'required|string|min:2|max:40',
            'Editora' => 'required|string|min:2|max:40',
            'Edicao' => "required|integer|min:1|max:999|unique:Livro,Edicao,{$bookId},Codl,Titulo,{$this->Titulo}",
            'AnoPublicacao' => 'required|integer|min:1900|max:' . date('Y'),
            'Valor' => 'required|numeric|min:0|max:99999999.99',
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:Autor,CodAu',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'exists:Assunto,CodAs',
        ];
    }
}
