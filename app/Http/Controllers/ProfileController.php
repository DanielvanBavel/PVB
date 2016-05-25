<?php

namespace SocialApp\Http\Controllers;

use Auth;
use DB;
use SocialApp\Models\User;
use SocialApp\Models\Status;
use Illuminate\Http\Request;
use SocialApp\Http\Requests\ProfileRequest;

Class ProfileController extends Controller
{
    public function getProfile(User $user, Status $statuses) {
        $statuses = $this->getMinePosts();

       	return view('profile.index')->with([
            'profile' => $user, 
            'statuses' => $statuses
        ]);
    }

    public function getEdit(User $user) {
        return view('profile.edit')->with(['profile' => $user]);
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

    public function viewFriendsFromProfile(User $user) {
        return view('profile.friends')->with(['profile' => $user]);
    }

    public function getMinePosts() {
       return Status::where('user_id', Auth::user()->id)
              ->whereNull('parent_id')->orderBy('created_at', 'desc')->get();
    }
}