<?php

namespace App\Units\Books\Http\Requests;

use App\Support\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    public function rules()
    {
        $currentSubject = $this->route('subject');
        $subjectId = null === $currentSubject ? null : $currentSubject->CodAs;

        return [
            'Descricao' => "required|string|min:2|max:20|unique:Assunto,Descricao,{$subjectId},CodAs",
        ];
    }
}
