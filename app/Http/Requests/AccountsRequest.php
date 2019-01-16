<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountsRequest extends FormRequest
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
            'title' => 'required|string|max:200|min:5',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
          'title.required' => 'accounts.Account Title Must be filled',
          'amount.required' => 'accounts.Account Amount Must be filled',

          'title.max' => 'accounts.Account Title Must Not Excced 200 Characters',

          'title.min' => 'accounts.Account Title Must Not Be Less Than 5 Characters',

          'amount.numeric' => 'accounts.Account Must Not Be Numeric',

        ];
    }
}
