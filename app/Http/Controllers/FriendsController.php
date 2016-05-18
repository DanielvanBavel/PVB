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
		return view('friends.index');
	}
}
