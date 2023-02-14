<?php

namespace App\Http\Requests\API\ShoppingSession;

use Illuminate\Foundation\Http\FormRequest;

class CreateSessionRequest extends FormRequest
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
            'session_id' => 'required|unique:shopping_sessions'
        ];
    }

    public function messages()
    {
        return [
            'session_id.required' => 'Shop Code cannot be empty.'
        ];
    }
}
