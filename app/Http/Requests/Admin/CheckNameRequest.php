<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CheckNameRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required', 'string',
            ];
    }
}
