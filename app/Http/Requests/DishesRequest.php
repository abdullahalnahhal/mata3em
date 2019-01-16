<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesRequest extends FormRequest
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
            'name' => 'required|string|max:200|min:3',
            'dish_category_id' => 'required|numeric|exists:dish_categories,id',
            'dish_unit_id' => 'required|numeric|exists:dishes_units,id',
            'price' => 'nullable|numeric',
            'amount' => 'nullable|numeric',
            'status' => 'nullable|numeric',
            'changable' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'menue.Dish Name Must be filled',
          'name.max' => 'menue.Dish Name Must be filled',
          'name.min' => 'menue.Dish Name Must be filled',

          'dish_category_id.required' => 'menue.Category Must be Selected',
          'dish_category_id.numeric' => 'menue.Category Must be Selected',
          'dish_category_id.exists' => 'menue.Category Must be Selected',

          'dish_unit_id.required' => 'menue.Unit Must be Selected',
          'dish_unit_id.numeric' => 'menue.Unit Must be Selected',
          'dish_unit_id.exists' => 'menue.Unit Must be Selected',

          'price.numeric' => 'menue.Price Must be Numeric',

          'amount.numeric' => 'menue.amount Must be Numeric',

          'status.numeric' => 'menue.Status Must be Checked',

          'changable.numeric' => 'menue.Changable Must be Checked',

        ];
    }
}
