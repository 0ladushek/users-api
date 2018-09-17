<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Entities\User;

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
            'state' => 'string|max:15|in:'.User::STATUS_ACTIVE.','.User::STATUS_NON_ACTIVE,
            'group_id' => 'integer|exists:groups,id'
        ];
    }
}
