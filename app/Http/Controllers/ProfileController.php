<?php

namespace SocialApp\Http\Controllers;

use Auth;
use SocialApp\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('profile.index');
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'alpha|max:50',
            'lastname' => 'max:50',
        ]);

        Auth::user()->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'adres' => $request->input('adres'),
            'zipcode' => $request->input('zipcode'),
            'place' => $request->input('place'),
            'province' => $request->input('province'),
            'phonenumber' => $request->input('phonenumber'),

        ]);

        return redirect()
            ->route('profile.edit')
            ->with('info', 'Je profiel is succesvol geupdatet');
    }
}