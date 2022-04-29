<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CheckPassRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => 'required|min:8|max:32' ,
            'cf_password'=> 'same:password',
        ];
    }
    public function attributes()
    {
        return [
            'cf_password' => 'Xác nhận mật khẩu',
        ];
    }

}
