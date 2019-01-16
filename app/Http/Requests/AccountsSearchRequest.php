<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountsSearchRequest extends FormRequest
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
            'from' => 'required|date',
            'to' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
          'from.required' => 'accounts.From Must be filled',
          'to.required' => 'accounts.To Must be filled',

          'from.date' => 'accounts.Form Must Be Date',
          'to.min' => 'accounts.To Must Be Date',

        ];
    }
}
