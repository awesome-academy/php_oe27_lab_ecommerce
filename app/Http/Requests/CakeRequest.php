<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CakeRequest extends FormRequest
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
            'name' => 'required|min:3|max:10|unique:cakes,name,' . $this->route('cake'),
            'description' => 'required',
            'quanity' => 'required',
            'price' => 'required',
            'price_sale' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('setting.name_required'),
            'name.min' => trans('setting.name_min'),
            'name.max' => trans('setting.name_max'),
            'name.unique' => trans('setting.unique'),
            'description.required' => trans('setting.name_required'),
            'quanity.required' => trans('setting.name_required'),
            'price.required' => trans('setting.name_required'),
            'price_sale.required' => trans('setting.name_required'),
            'status.required' => trans('setting.name_required'),
        ];
    }
}
