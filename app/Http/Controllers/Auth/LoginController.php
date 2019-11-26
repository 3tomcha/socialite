<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        // dd(Socialite::driver('github')
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
        // ユーザー作成
        $auth = User::firstOrCreate([
            'name' => $user->name,
            'email' => $user->email,
    ]);
        \Auth::login($auth);

        return redirect('/');

        // $auth = new User();
        // $auth->name = $user->name;
        // $auth->email = $user->email;
        // $auth->save();
    }
}
