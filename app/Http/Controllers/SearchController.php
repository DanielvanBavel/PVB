<?php

namespace SocialApp\Http\Controllers;

use DB;
use SocialApp\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT(firstname, ' ', lastname)"), 'LIKE', "%{$query}%")
            ->orWhere('place', 'LIKE', "%{$query}%")
            ->get();

        return view('search.results')->with('users', $users);
    }
}