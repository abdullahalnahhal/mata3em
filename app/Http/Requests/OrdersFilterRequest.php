<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersFilterRequest extends FormRequest
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
            'client_phone' => 'nullable|numeric',
            'number' => 'nullable|numeric|exists:orders,number',
            'register_from' => 'nullable|date',
            'register_to' => 'nullable|date',
            'deliver_from' => 'nullable|date',
            'deliver_to' => 'nullable|date',
            'order_status_id' => 'nullable|exists:orders_status,id',
        ];
    }
    public function messages()
    {
        return [
          'client_phone.numeric' => 'orders.Phone Must Be Numeric',
          'number.numeric' => 'orders.Order Number Must Be Numeric',

          'register_from.date' => 'orders.Register From Must Be Date',
          'register_to.date' => 'orders.Register To Must Be Date',
          'deliver_from.date' => 'orders.Delivered From Must Be Date',
          'deliver_to.date' => 'orders.Delivered To Must Be Date',

          'number.exists' => 'orders.Order Number Doesn\'t Exist',
          'order_status_id.exists' => 'orders.Order Number Must Be Selected',
        ];
    }
}
