<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'dish' => 'required|array',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
          'dish.required' => 'clients.You Have To Select Dishes First',
          'delivery_date.required' => 'clients.You Have To Set Delivery Date',
          'delivery_time.required' => 'clients.You Have To Set Delivery Time',

          'dish.array' => 'clients.You Have To Select Dishes First',

          'delivery_date.date' => 'clients.You Have To Set Delivery Date',

        ];
    }
}
