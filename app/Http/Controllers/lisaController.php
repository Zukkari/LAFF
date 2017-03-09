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


        //$data=array('firstName'=>$firstName, 'lastName'=>$lastName, 'mobile'=>$mobile);
        DB::select('CALL lisa_postitus (?,?,?,?,?)',array("nonane", $teema, $tekst, "no link", "kaotatud"));
        /*
        DB::table('postitus')->insert(
            ['kasutaja' => "noname", 'pealkiri' => $teema, 'kirjeldus'=>$tekst, 'pildilink'=>"linki pole",
                'peatag'=>'kaotatud']);
        //return ("Its alive");
        return view ('welcome');
        */
        /*
        DB::table('test')->insert([
            ['pealkiri' => 'taylor@example.com', 'sisu' => 'testime', 'link'=> 'testimiseks'],
        ]);*/
    }
}
