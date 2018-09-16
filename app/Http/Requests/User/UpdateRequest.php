<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'string|max:255',
            'first_name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'state' => 'string|max:15|in:active,non active'
        ];
    }
}