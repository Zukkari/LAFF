<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class postitusController extends Controller
{
    public function index()
    {
        $postitus =DB::select('CALL postitus()');
        $postitusi= DB::select('CALL postituste_arv()');


        return view("postitus", ['postitus'=>$postitus] ,[ 'postitusi'=>$postitusi]);
    }
}