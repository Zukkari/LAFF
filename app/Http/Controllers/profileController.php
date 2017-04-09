<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Validator;
use Redirect;
use Illuminate\Support\Collection;

class ProfileController extends Controller
{

    public function index()
    {

        if (Auth::check()) {
            $kasutaja = auth()->user()->kasutajanimi;
            //$postitused_kasutaja = DB::table('postitus_vaade')->first();
            $postitusKasutaja = DB::table('postitus_vaade')->get()->where('kasutaja', $kasutaja);

            return view("profile")->with('postitusKasutaja', $postitusKasutaja);
        } else {
            Session::put('redirectTo', 'profile');
            return redirect('/login');
        }



    }
}