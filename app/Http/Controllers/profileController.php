<?php
namespace App\Http\Controllers;
use App\User;
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

    public function index($id)
    {

        $user = User::where('kasutajanimi',$id) -> first();
        $postitusKasutaja = DB::table('postitus_vaade')->get()->where('kasutaja',$user->kasutajanimi);
        return view('profile',['name' => $user])->with('postitusKasutaja',$postitusKasutaja );



    }
}