<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectCategoryUpdateRequest extends Request
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
            'title' => 'required|max:255|unique:project_categories,title,' . $this->route('project_category'),
            'slug'  => 'required|max:255|unique:project_categories,slug,' . $this->route('project_category'),
        ];
    }
}
