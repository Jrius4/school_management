<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request
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
            'slug'         => 'required|unique:projects',
            'excerpt'      => 'required',
            'body'         => 'required',
            'project_category_id'  => 'required',
            'image'        => 'mimes:jpg,jpeg,bmp,png',
        ];

        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:projects,slug,' . $this->route('project');
                break;
        }
        return $rules;
    }
}
