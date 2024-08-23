<?php

namespace App\Http\Requests\V1\Grades;

use Illuminate\Foundation\Http\FormRequest;;

class CreateGradeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}
