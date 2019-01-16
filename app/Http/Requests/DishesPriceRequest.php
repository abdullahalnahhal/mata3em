<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesPriceRequest extends FormRequest
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
            'price' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
          'price.required' => 'menue.Price Must be filled',
          'price.numeric' => 'menue.Price Must be Numeric',
        ];
    }
}
