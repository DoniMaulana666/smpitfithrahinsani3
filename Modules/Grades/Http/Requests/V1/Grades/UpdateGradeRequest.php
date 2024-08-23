<?php

namespace App\Http\Requests\V1\Grades;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}
