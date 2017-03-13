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
        //LARAVEL SULGEB KÕIK ÜHENDUSED ANDMEBAASIGA ISE!
        $teema=$req->input('teema');
        $tekst=$req->input('tekst');
        $tagid=$req->input('tagid');
        $pildilink=$req->input('pildilink');
        if (empty($pildilink)){ //Kui pidlilinki pole lisatud, siis näitame pilti, et pilti pole :D
            DB::select('CALL lisa_postitus (?,?,?,?,?)',array("noname", $teema, $tekst,"http://www.katiehalerealtor.com/elements/images/design/no_image_available.jpg", $tagid));
        }
        else {
            DB::select('CALL lisa_postitus (?,?,?,?,?)',array("noname", $teema, $tekst,$pildilink, $tagid));
        }




        return view('welcome');

    }
}
