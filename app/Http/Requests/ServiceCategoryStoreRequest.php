<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServiceCategoryStoreRequest extends Request
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
            'title' => 'required|unique:service_categories|max:255',
            'slug'  => 'required|unique:service_categories|max:255',
            'image' => 'mimes:jpg,jpeg,bmp,png',
        ];
    }
}
