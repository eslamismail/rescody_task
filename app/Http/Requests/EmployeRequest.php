<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
                'company_id' => 'required|exists:companies,id',
                'first_name' => 'required|string|min:3',
                'last_name' => 'required|string|min:3',
                'email' => 'required|unique:employes,email',
                'phone' => 'required|regex:/(01)[0-9]{9}/',
            ];
        } else {
            $id = $this->route()->parameters['employee'];
            return [
                'company_id' => 'required|exists:companies,id',
                'first_name' => 'required|string|min:3',
                'last_name' => 'required|string|min:3',
                'email' => 'required|unique:employes,email,' . $id,
                'phone' => 'required|regex:/(01)[0-9]{9}/',
            ];
        }
    }
}
