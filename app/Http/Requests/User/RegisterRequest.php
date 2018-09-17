<?php

namespace App\Http\Requests\User;

use App\Entities\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'state' => 'required|string|max:15|in:'.User::STATUS_ACTIVE.','.User::STATUS_NON_ACTIVE,
            'group_id' => 'required|integer|exists:groups,id'
        ];
    }
}
