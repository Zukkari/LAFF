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
class lisaController extends Controller
{

    public function index()

    {
        //$users = DB::table('table')->get();

        //return view('user.index', ['users' => $users]);
        if (Auth::check()) {
            return view("lisa");
        } else {
            Session::put('redirectTo', 'lisa');
            return redirect('/login');
        }
    }



    public function create() {
        return view('lisa');
    }

    public function store(Request $req)
    {
        //LARAVEL SULGEB KÕIK ÜHENDUSED ANDMEBAASIGA ISE!
        $teema=$req->input('teema'); //võtame kasutaja sisendid andmebaasi sisestamiseks
        $tekst=$req->input('tekst');
        $tagid=$req->input('tagid');
        $file = array('kuulutusePilt' => Input::file('kuulutusePilt')); //siit saame kasutaja sisestatud pildi
        $kasutaja = auth()->user()->id; //siit saame autoritseeritud kasutaja nime


        if (empty($file['kuulutusePilt'])) { //kui kasutaja pilti ei lisa, paneme pildi asemele meie default pildi
            DB::select('CALL lisa_postitus (?,?,?,?,?)',array($kasutaja, $teema, $tekst,"/../public/pictures/no_image_available.jpg", $tagid));
            Session::flash('msg', 'Success');



            return redirect('lisa');

        }
        else { //siin toimub pildi töötlemine ja vastamine standartile

            $rules = array('kuulutusePilt' => 'image',);
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) { //TODO kui mingi viga tekib, hetke redirectib lihtsalt tagasi, ei sisesta postitust, vaja errorit luua
                Session::flash('msg_error', 'Fail');
                return redirect('lisa');

            } else { //kui validaatoril mingeid probleeme ei teki, suuname pildi andmebaasi, algusese salvestame selle serveris
                if (Input::file('kuulutusePilt')->isValid()) {
                    //$destinationPath = '/webpages/lostafcsut/public_html/public/pictures';
                    $destinationPath = 'C:\xampp\htdocs\LAFF\public\pictures';
                    $extension = Input::file('kuulutusePilt')->getClientOriginalExtension();
                    $fileName = rand(11111, 99999) . '.' . $extension; // nime muutmine
                    Input::file('kuulutusePilt')->move($destinationPath, $fileName); //kuhu pildi pannakse
                    $path='/../LAFF/public/pictures';
                    DB::select('CALL lisa_postitus (?,?,?,?,?)',array($kasutaja, $teema, $tekst,$path."/".$fileName, $tagid));

                    Session::flash('msg', 'Success');
                    return redirect('lisa');

                } else {
                    // sending back with error message.
                    Session::flash('msg_error', 'Fail');
                    return redirect('lisa');
                }
            }
        }
    }




}
