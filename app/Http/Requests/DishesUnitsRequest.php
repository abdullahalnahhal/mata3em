<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesUnitsRequest extends FormRequest
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
            'shortcut' => 'required|string|unique:dishes_units,shortcut|max:5|min:2',
            'status' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'menue.Unit Name Must be filled',
          'shortcut.required' => 'menue.Shortcut Must be filled',

          'shortcut.unique' => 'menue.Shortcut Must be Unique',

          'name.max' => 'menue.Name Must Not Excced 200 Characters',
          'shortcut.max' => 'menue.Shortcut Must Not Excced 200 Characters',

          'name.min' => 'menue.Name Must Not Be Less Than 5 Characters',
          'shortcut.min' => 'menue.Shortcut Must Not Be Less Than 2 Characters',

        ];
    }
}
