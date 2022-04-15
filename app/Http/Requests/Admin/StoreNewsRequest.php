<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     *
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required', 'string', 'max:255'
            ],
            'description' => [
                'required', 'string'
            ],
            'community_id' => [
                'required'
            ],
            'censors' => [
                'required'
            ],
            'content' => [
                'required', 'string'
            ],
        ];
    }
}