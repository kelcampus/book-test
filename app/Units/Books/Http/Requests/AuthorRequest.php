<?php

namespace App\Units\Books\Http\Requests;

use App\Support\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function rules()
    {
        $currentAuthor = $this->route('author');
        $authorId = null === $currentAuthor ? null : $currentAuthor->CodAu;

        return [
            'Nome' => "required|string|min:2|max:40|unique:Autor,Nome,{$authorId},CodAu|regex:/[a-zA-Z]/",
        ];
    }
}
