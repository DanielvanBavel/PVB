<?php

namespace SocialApp\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use SocialApp\Models\Status;

class HomeController extends Controller
{

	/*
	* Get the initial load of statuses.
	*/

	public function index()
	{
		if (Auth::check()) {
			$statuses = Status::notReply()->where(function ($query) {
				return $query->where('user_id', Auth::user()->id)
					->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
			})->orderBy('created_at', 'desc')->take(20)->get();

			return view('timeline.index')->with('statuses', $statuses);
		}
		return view('home');
	}

	/*
	* Ajax request wil be send to this function to load in more statuses.
	*/

	public function getMoreStatuses($counter)
	{
		if (Auth::check()) {
			$statuses = Status::notReply()->where(function ($query) {
				return $query->where('user_id', Auth::user()->id)
					->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
			})->orderBy('created_at', 'desc')->limit(20)->offset($counter)->get();

			return view('timeline.index')->with('statuses', $statuses);
		}
	}
}