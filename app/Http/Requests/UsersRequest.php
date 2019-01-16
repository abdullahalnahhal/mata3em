<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'username' => 'required|string|unique:users,email',
            'password' => 'required|string|same:password_confirm',
            'password_confirm' => 'required',
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'settings.Name Must Be Filled First',
          'username.required' => 'settings.User Name Must Be Filled First ',
          'password.required' => 'settings.Password Must Be Filled First',
          'password_confirm.required' => 'settings.Password Confirmation Must Be Filled First',

          'username.unique' => 'settings.These User Name Taken Before, User Name Must Be Unique',

          'password.same' => 'settings.Password Must Match The Confirm Field',

        ];
    }
}
