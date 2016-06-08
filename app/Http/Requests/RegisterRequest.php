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
            'phonenumber' => 'min:10|max:10'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Het veld email is verplicht om in te vullen',
            'birthdate.age' => 'Je moet ten minste 65 jaar oud zijn.',
            'phonenumber.min' => 'Je moet minimaal 10 karakters invullen voor een geldig Nederlands telefoonnummer',
            'phonenumber.max' => 'Je kan maximaal 10 karakters invullen voor een geldig Nederlands telefoonnummer'
        ];
    }
}
