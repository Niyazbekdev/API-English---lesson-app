<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_type_id' => 'required|exists:question_types,id',
            'title' => "required",
            'help' => "nullable",
        ];
    }
}
