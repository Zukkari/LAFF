<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    /*
     *  Kontroller, mis vastab facebooki autemise eest
     */

    /*
     *  Funktsioon, mis saadab facebooki päringu kasutaja autentimiseks
     */
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    /*
     *  Funktsioon, milles sisaldub facebooki vastus kasutaja autentimisest ja tema andmed, kui autentimine õnnestus
     */
    public function callback() {
        $facebookuser = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($facebookuser);

        Auth::login($authUser);

        return redirect('/postitus');
    }

    /*
     * Kui kasutaja on olemas, siis tagastame seda, kui ei ole siis loome uue
     * Paneme talle random parooli ning kasutajanime, kuna facebook ei anna meil neid kaasa.
     * Kui kasutaja tahab oma kasutajasse sisse logida parooliga, siis saab ta parooli kätte reset password abil.
     */

    public function findOrCreateUser($facebookUser) {
        $authUser = User::where('email', $facebookUser->getEmail())->first();

        if ($authUser) return $authUser;

        $authUser = User::create([
            'kasutajanimi' => str_random(),
            'email' => $facebookUser->getEmail(),
            'password' => bcrypt(str_random(16)),
        ]);

        return $authUser;
    }
}
