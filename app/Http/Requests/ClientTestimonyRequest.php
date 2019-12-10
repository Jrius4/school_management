<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientTestimonyRequest extends Request
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
            'name'        => 'required',
            'slug'         => 'required|unique:client_testimonies',
            'title_of_client' => 'required',
            'message'         => 'required',
            'image'        => 'mimes:jpg,jpeg,bmp,png',
        ];

        switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:client_testimonies,slug,' . $this->route('client_testimony');
                break;
        }
        return $rules;
    }
    
}
