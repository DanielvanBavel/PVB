<?php

namespace SocialApp\Http\Requests;

use SocialApp\Http\Requests\Request;

class ProfileRequest extends Request
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
            'firstname'     => 'alpha|min:3|max:20',
            'lastname'      => 'max:35',
            'adres'         => '',
            'zipcode'       => '',
            'place'         => '',
            'phonenumber'   => 'max:10:',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Het veld email is verplicht om te kunnen inloggen',
            'password.required' => 'Het veld password is verplicht om te kunnen inloggen',
        ];
    }
}
