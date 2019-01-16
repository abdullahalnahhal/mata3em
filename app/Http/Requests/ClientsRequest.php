<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
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
            'name' => 'required|string|max:200|min:5',
            'tel1' => 'required|string|unique:clients,tel1|max:30|min:5',
            'tel2' => 'nullable|string|unique:clients,tel2|max:30|min:5',
            'address' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'clients.Client Name Must be filled',
          'tel1.required' => 'clients.Client Telepphone 1 Must be Filled',
          'address.required' => 'clients.Client Address Must be filled',

          'tel1.unique' => 'clients.Client Telepphone 1 Must be Unique',
          'tel2.unique' => 'clients.Client Telepphone 2 Must be Unique',

          'name.min' => 'clients.Client Name Must Not be Less Than 5',
          'tel1.min' => 'clients.Client Telepphone 1 Must Not be Less Than 5',
          'tel1.min' => 'clients.Client Telepphone 1 Must Not be Less Than 5',

          'name.max' => 'clients.Client Name Must Not be More Than 200',
          'tel1.max' => 'clients.Client Telepphone 1 Must Not be More Than 30',
          'tel1.max' => 'clients.Client Telepphone 1 Must Not be More Than 30',

        ];
    }
}
