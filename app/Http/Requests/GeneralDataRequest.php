<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralDataRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'phone1' => 'required',
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'settings.Name Have To Be Filled',
          'address.required' => 'settings.Address Have To Be Filled',
          'phone1.required' => 'settings.Phone 1 Have To Be Filled',

        ];
    }
}
