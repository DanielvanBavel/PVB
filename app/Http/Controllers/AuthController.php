<?php

namespace SocialApp\Http\Controllers;

use Auth;
use Carbon\Carbon;
use SocialApp\Models\User;
use SocialApp\Models\Admin;
use Illuminate\Http\Request;
use SocialApp\Http\Requests\RegisterRequest;
use SocialApp\Http\Requests\LoginRequest;
use SocialApp\Http\Requests\AdminRegisterRequest;

class AuthController extends Controller
{
	public function getRegister()
	{
		return view('auth.register');
	}

	public function postRegister(RegisterRequest $request)
	{
		User::create([
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'birthdate' => $request->input('birthdate'),
			'firstname' => $request->input('firstname'),
			'lastname' => $request->input('lastname')
		]);

		return redirect()
			->route('home')
			->with('info', 'Uw account is aangemaakt, u kunt nu inloggen');
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	public function postLogin(LoginRequest $request, Admin $admin) {
		
		/* bestaat admin gebruiker*/
		// dd($admin->user());

		// if($admin->user()->id)

		/* is de admin gebruiker gekoppeld aan een user */   

		if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
			return redirect()->back()->with('info', 'Er kan niet ingelogd worden met het ingevulde email adres en wachtwoord, probeer het opnieuw');
		}
		return redirect()->route('home')->with('info', 'Je bent succesvol ingelogd');
	}

	public function getPasswordForgotten() {
		return view('auth.recover');
	}

	public function postPasswordForgotten(RecoverRequest $request) {
		echo "recover";
	}

	public function askHelp() {

		return view('auth.askhelp');
	}

	// public function registerAsAdmin() {
	// 	return view('auth.registerAdmin');
	// }

	// public function postRegisterAdmin(AdminRegisterRequest $request) {
	// 	Admin::create([
	// 		'user_id' => 1,
	// 		'email' => $request->input('email'),
	// 		'password' => bcrypt($request->input('password'))
	// 	]);

	// 	return redirect()
	// 		->route('home')
	// 		->with('info', 'Het admin account is aangemaakt, u kunt nu inloggen en iemand helpen');
	// }

	public function getSignout() {
		Auth::logout();
		return redirect()->route('home');
	}

	public function sendAdminRequest(request $request) {
		if ($request->input('email')) {
			$activation_code = $this->generateRandomString();
			$this->setActivationCode($activation_code);
			mail($request->input('email'), 'Admin worden voor GEBRUIKER', "http://pvb.dev/register/admin/$activation_code");
		}
		return redirect()->route('auth.send');
	}

	public function send() {
		return view('auth.send');
	}

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

		return redirect('/');
	}

	public function createAdmin(AdminRegisterRequest $request, $activation_code) {
		Admin::where('activation_code',  $activation_code)
			->update([	'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'activation_code' => ''
		]);
		return redirect('/');
	}
}