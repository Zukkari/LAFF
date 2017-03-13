<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Illuminate\Support\Collection;
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
        $file = array('kuulutusePilt' => Input::file('kuulutusePilt'));

        $arv =count($file);
        if (empty($file['kuulutusePilt'])) {
            DB::select('CALL lisa_postitus (?,?,?,?,?)',array("noname", $teema, $tekst,"http://www.katiehalerealtor.com/elements/images/design/no_image_available.jpg", $tagid));
        }
        else {
            $rules = array('kuulutusePilt' => 'image',); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to('lisa')->withInput()->withErrors($validator);
            } else {
                // checking file is valid.
                if (Input::file('kuulutusePilt')->isValid()) {
                    $destinationPath = '/webpages/lostafcsut/public_html/public/pictures'; // upload path
                    $extension = Input::file('kuulutusePilt')->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                    Input::file('kuulutusePilt')->move($destinationPath, $fileName); // uploading file to given path
                    $path='/../public/pictures';
                    DB::select('CALL lisa_postitus (?,?,?,?,?)',array("noname", $teema, $tekst,$path."/".$fileName, $tagid));
                    // sending back with message
                    //Session::flash('success', 'Upload successfully');
                    //return Redirect::to('lisa');
                } else {
                    // sending back with error message.
                    Session::flash('error', 'uploaded file is not valid');
                    return Redirect::to('lisa');
                }
            }
        }
        return view('welcome');
    }
}
