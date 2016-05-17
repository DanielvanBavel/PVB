<?php

namespace SocialApp\Http\Controllers;

use DB;
use Auth;
use SocialApp\Models\User;
use SocialApp\Models\Friends;

class FriendsController extends Controller
{
	public function index()
	{
		$friends = Friends::mine();

		dd($friends);
		

		$friends = Friends::where('user_id', Auth::id());

		return view('friends.index', $friends);
	}
}
