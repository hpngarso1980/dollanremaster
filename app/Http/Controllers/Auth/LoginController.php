<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect user to provider drive
     *
     * @param string $driver
     * @return \Illuminate\Http\Response
     *
    */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect;
    }

    /**
     * Obtain user information in every access to provider
     *
     * @param string $driver
     * @return \illuminate\Http\Response
     *
     */
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        //check if user is exsisting user
        $existingUser = User::where('email', $user->email)->first;

        if($existingUser){
            //log the user in
            auth() -> login($existingUser, true);
        } else {
            //create new user
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->socialite_id = $user->id;
            $newUser->save();

            auth() -> login($newUser, true);
        }
        return redirect()->to('/home');
    }
}
