<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|string|exists:users,email',
            'password' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
          'username.required' => 'settings.User Name Must Be Filled First ',
          'password.required' => 'settings.Password Must Be Filled First',
          'username.exists' => 'settings.User Name Must Be Registered First',
        ];
    }
}
