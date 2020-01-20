<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:10|unique:categories,name,' . $this->route('category'),
            'parent_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('setting.name_required'),
            'name.min' => trans('setting.name_min'),
            'name.max' => trans('setting.name_max'),
            'name.unique' => trans('setting.unique'),
        ];
    }
}
