<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemProcessRequest extends FormRequest
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
            'slug'         => 'required|unique:system_processes',
            'excerpt'      => 'required',
            'body'         => 'required',
        ];

        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:system_processes,slug,' . $this->route('system_process');
                break;
        }
        return $rules;
    }
}
