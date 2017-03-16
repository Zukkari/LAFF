<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username() {
        return 'kasutajanimi';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back();
    }

    public function redirectToProvider()
    {
        return Socialize::with('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialize::with('facebook')->user();
        $username = DB::select('CALL getUsername(?)', $user->getEmail());
        $password = DB::select('CALL getUserPassword(?)', $user->getEmail());

        Auth::attempt(['username' => $username, 'password' => $password]);
    }
}