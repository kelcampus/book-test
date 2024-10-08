<?php

namespace App\Units\Books\Http\Requests;

use App\Support\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => "exists:users,id",
            'date' => 'required|date|date_format:Y-m-d',
            'share' => 'required|boolean',
            'amount' => 'required|numeric|min:0.1',
            'description' => 'nullable',
            'author_ids' => 'required|array',
            'author_ids.*' => 'integer|exists:expense_labels,id'
        ];
    }
}
