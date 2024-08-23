<?php

namespace App\Http\Requests\V1\Teachers;

use Illuminate\Foundation\Http\FormRequest;;

class CreateTeacherRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}
