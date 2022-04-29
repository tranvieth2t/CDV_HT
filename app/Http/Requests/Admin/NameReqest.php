<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class NameReqest extends FormRequest{

    public function rules(){
      return ['name' => 'required', 'string',];
    }

}
