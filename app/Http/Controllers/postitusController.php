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

        $postitus = DB::select('CALL postitus()'); //annab meile postituse informatsiooni
        $postitusi = DB::select('CALL postituste_arv()'); //mitu postitust on süsteemis

        return view("postitus", ['postitus' => $postitus], ['postitusi' => $postitusi]);
    }
}