<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CareerCategoryUpdateRequest extends Request
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
            'title' => 'required|max:255|unique:career_categories,title,' . $this->route('career_category'),
            'slug'  => 'required|max:255|unique:career_categories,slug,' . $this->route('career_category'),
        ];
    }
}
