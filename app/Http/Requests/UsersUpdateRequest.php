<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'nullable|string|same:password_confirm',
            'password_confirm' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'settings.Name Must Be Filled First',
          'username.required' => 'settings.User Name Must Be Filled First ',

          'password.same' => 'settings.Password Must Match The Confirm Field',

        ];
    }
}
