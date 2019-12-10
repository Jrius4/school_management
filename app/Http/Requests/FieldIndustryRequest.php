<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class FieldIndustryRequest extends Request
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
            'slug'         => 'required|unique:field_industries',
            'description'      => 'required',
        ];

        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:field_industries,slug,' . $this->route('field_industry');
                break;
        }
        return $rules;
    }
}
