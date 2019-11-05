<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'src' => 'image',
            'desigination' => 'required',
            'department' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users'
        ];
    }

    public function messages(){
        return[
            'firstName.required' => 'First Name is required',
            'lastName.required' => 'Last Name is required',
            'src.image' => 'The file must be an image',
            'desigination.required' => 'Desigination is required',
            'department.required' => 'Department Name is requires',
            'phone.required' => 'Phone no is required',
            // 'phone.regax' => 'Phone must be valid',
            'email.required'=> 'Emial is required',
            'email.emial' => 'Emial must be valid',
            'email.unique' => 'Emial already exists'
        ];
    }
}
