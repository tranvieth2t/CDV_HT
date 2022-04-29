<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CheckNameRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'string',],
            'password' => 'required|min:8|max:32' ,
            'cf_password'=> 'same:password',
            ];
    }
}
