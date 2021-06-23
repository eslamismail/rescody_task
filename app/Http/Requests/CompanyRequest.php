<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        if ($this->getMethod() == 'POST') {
            return [
                'name' => 'required',
                'email' => 'required|unique:companies,email',
                'logo' => 'required|dimensions:max_width=100,max_height=100',
            ];
        } else {
            $id = $this->route()->parameters['company'];
            return [
                'name' => 'required',
                'email' => "required|unique:companies,email,{$id}",
                'logo' => 'dimensions:max_width=100,max_height=100',
            ];
        }
    }
}
