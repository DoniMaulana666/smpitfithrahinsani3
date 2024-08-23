<?php

namespace App\Http\Requests\V1\Attendances;

use Illuminate\Foundation\Http\FormRequest;;

class CreateAttendanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}
