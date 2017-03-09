<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Config;
use Illuminate\Support\Facades\Session;

class langController extends Controller
{
    public function changeLocale($lang) {

        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }

        return redirect()->back();
    }
}
