<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class lisaController extends Controller
{

    public function index()

    {
        //$users = DB::table('table')->get();

        //return view('user.index', ['users' => $users]);
        return view ("lisa");
    }



    public function create() {
        return view('lisa');
    }

    public function store(Request $req)
    {
        $teema=$req->input('teema');
        $tekst=$req->input('tekst');
        $tagid=$req->input('tagid');


        //LARAVEL SULGEB KÕIK ÜHENDUSED ANDMEBAASIGA ISE!
        DB::select('CALL lisa_postitus (?,?,?,?,?)',array("noname", $teema, $tekst, "no link", $tagid));
        return view('welcome');

    }
}
