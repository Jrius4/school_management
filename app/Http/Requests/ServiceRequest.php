<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServiceRequest extends Request
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
            'title'        => 'required',
            'slug'         => 'required|unique:services',
            'excerpt'      => 'required',
            'body'         => 'required',
            'service_category_id'  => 'required',
            'image'        => 'mimes:jpg,jpeg,bmp,png',
        ];

        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:services,slug,' . $this->route('service');
                break;
        }
        return $rules;
    }
}
