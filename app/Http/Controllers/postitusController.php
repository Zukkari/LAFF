<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class postitusController extends Controller
{
    public function index()
    {
        $postitus =DB::select('CALL postitus()'); //annab meile postituse informatsiooni
        $postitusi= DB::select('CALL postituste_arv()'); //mitu postitust on süsteemis

        return view("postitus", ['postitus'=>$postitus] ,[ 'postitusi'=>$postitusi]);
    }
}