<?php

namespace SocialApp\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
    	if (Auth::check()) {
	        $this->currentUser = Auth::User();
	        
	        view()->share([
	        	'requests' => $this->currentUser->friendsRequests()
	        ]);
	    }
    }
}
