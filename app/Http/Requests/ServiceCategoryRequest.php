<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCategoryRequest extends FormRequest
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
        $rules = [
            'title'        => 'required|unique:service_categories',
            'slug'         => 'required|unique:service_categories',
            'image'        => 'mimes:jpg,jpeg,bmp,png',
        ];

        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:service_categories,slug,' . $this->route('service_category');
                $rules['title'] = 'required|unique:service_categories,title,' . $this->route('service_category');
                break;
        }
        return $rules;
    }
}
