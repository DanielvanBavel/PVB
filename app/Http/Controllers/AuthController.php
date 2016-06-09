<?php

namespace SocialApp\Http\Controllers;

use Auth;
use Hash;
use Carbon\Carbon;
use SocialApp\Models\User;
use SocialApp\Models\Admin;
use Illuminate\Http\Request;
use SocialApp\Http\Requests\RegisterRequest;
use SocialApp\Http\Requests\LoginRequest;
use SocialApp\Http\Requests\AdminRegisterRequest;
use SocialApp\Http\Requests\AdminInviteRequest;

class AuthController extends Controller
{
	public function getRegister()
	{
		return view('auth.register');
	}

	/*
	* Get the register form and create a new user. We use str_replace to get the space out of the zipcode.
	*/
	public function postRegister(RegisterRequest $request)
	{
		User::create([
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'birthdate' => $request->input('birthdate'),
			'firstname' => $request->input('firstname'),
			'lastname' => $request->input('lastname'),
			'adres'		=> $request->input('adres'),
			'zipcode'	=> str_replace(' ', '', $request->input('Zipcode')),
			'place'		=> $request->input('place'),
			'province'	=> $request->input('province'),
			'phonenumber'	=> $request->input('phonenumber')
		]);

		return redirect()
			->route('auth.login')
			->with('info', 'Uw account is aangemaakt, u kunt nu inloggen');
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	/*
	* For the postLogin function we have to check for an user and admin login. 
	* First we check for the normal user login and when that fails we check the admin login.
	*/
	public function postLogin(LoginRequest $request, Admin $admin)
	{	
		$credentials = $request->only(['email', 'password']);
		$remember = $request->has('remember');

		if (Auth::attempt($credentials, $remember)) {	
			return redirect()->route('home')->with('info', 'Je bent succesvol ingelogd');
		}

		$admin = Admin::where('email', $request->email)->first();

		if ($admin == null) {
			return redirect()->back()->with('info', 'Er kan niet ingelogd worden met het ingevulde email adres en wachtwoord, probeer het opnieuw');
		}

		if (Hash::check($request->password, $admin->password)) {
			Auth::loginUsingId($admin->user_id);	
		
			return redirect()->route('home')->with('info', 'Je bent succesvol ingelogd als Administrator');
		}

		return redirect()->back()->with('info', 'Er kan niet ingelogd worden met het ingevulde email adres en wachtwoord, probeer het opnieuw');
	}

	public function askHelp() {

		return view('auth.askhelp');
	}

	public function getSignout() {
		Auth::logout();
		return redirect()->route('home');
	}

	public function send() {
		return view('auth.send');
	}

	/*
	* Admin registration
	*/

	public function setActivationCode($rndStr) {
		 Admin::create([
			'user_id' => Auth::id(),
			'activation_code' => $rndStr
		]);
	}

	public function generateRandomString($length = 25) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function registerAsAdmin($activation_code) {
		if (Admin::where('activation_code', $activation_code)->count() == 1) {
			return view('auth.registerAdmin')->with('activation_code', $activation_code);
		};

		return redirect()->route('home');
	}

	public function createAdmin(AdminRegisterRequest $request, $activation_code) {
		Admin::where('activation_code',  $activation_code)
			->update([	'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'activation_code' => ''
		]);
		return redirect()->route('home');
	}

	public function sendAdminRequest(request $request) {
		if ($request->input('email')) {
			$activation_code = $this->generateRandomString();
			$this->setActivationCode($activation_code);
			mail($request->input('email'), 'Admin verzoek', "Klik op de volgende link om op de registratie pagina te komen. http://pvb.dev/register/admin/$activation_code");
		}
		return redirect()->route('auth.send');
	}
}