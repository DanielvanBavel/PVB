<?php

namespace SocialApp\Http\Controllers;

use Auth;
use DB;
use SocialApp\Models\User;
use Illuminate\Http\Request;

Class ProfileController extends Controller
{
    public function getProfile() {
    	$id = Auth::user()->id;  	
       	return view('profile.index')->with('id', $id);
    }

    public function getEdit() {
        return view('profile.edit');
    }

    public function postEdit(ProfileRequest $request) {
        Auth::user()->update([
            'firstname'     => $request->input('firstname'),
            'lastname'      => $request->input('lastname'),
            'adres'         => $request->input('adres'),
            'zipcode'       => $request->input('zipcode'),
            'place'         => $request->input('place'),
            'province'      => $request->input('province'),
            'phonenumber'   => $request->input('phonenumber'),
        ]);

        return redirect()
            ->route('profile.edit')
            ->with('info', 'Je profiel is succesvol bijgewerkt');
    }
}