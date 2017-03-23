<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class postitusController extends Controller
{
    public function index()
    {

        Session::put('redirectTo', 'postitus');


        $postitusi = DB::select('CALL postituste_arv()'); //mitu postitust on süsteemis
        $postitus = DB::table('postitus_vaade')->paginate(5);


        return view("postitus", ['postitusi' => $postitusi])->with('postitus', $postitus);
    }
}