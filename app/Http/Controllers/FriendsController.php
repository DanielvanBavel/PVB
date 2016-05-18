<?php

namespace SocialApp\Http\Controllers;

use Auth;
use SocialApp\Models\User;

class FriendsController extends Controller
{
	public function getFriends(User $user)
	{
		$id = Auth::user()->id;
		$friends = Auth::user->friends;

		dd(friends);

		return view('friends.index');
	}


}
