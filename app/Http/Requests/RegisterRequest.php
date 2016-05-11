<?php

namespace SocialApp\Http\Requests;

use SocialApp\Http\Requests\Request;

class RegisterRequest extends Request
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
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6',
            'birthdate' => 'required|date|age:65',
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:40',
        ];
    }

    public function messages()
    {
        return [
            'birthdate.age' => 'Je moet ten minste 65 jaar oud zijn.',
        ];
    }
}
