<?php

namespace SocialApp\Http\Controllers;

use Auth;
use Carbon\Carbon;
use SocialApp\Models\User;
use Illuminate\Http\Request;
use SocialApp\Http\Requests\RegisterRequest;
use SocialApp\Http\Requests\LoginRequest;

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

    public function postLogin(LoginRequest $request) {
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', 'Er kan niet ingelogd worden met het ingevulde email adres en wachtwoord, probeer het opnieuw');
        }
        return redirect()->route('home')->with('info', 'Je bent succesvol ingelogd');
    }

    public function getPasswordForgotten() {
        return view('auth.recover');
    }

    public function PostPasswordForgotten(RecoverRequest $request) {
        echo "recover";
    }

    public function askHelp() {
        return view('auth.askhelp');
    }

    public function getSignout() {
        Auth::logout();
        return redirect()->route('home');
    }
}