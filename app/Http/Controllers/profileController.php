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

    public function index($kasutaja)
    {

        $user = User::where('kasutajanimi',$kasutaja)->first();
        $postitusKasutaja = DB::table('postitus_vaade')->get()->where('kasutaja',$user->kasutajanimi);
        $reiting = DB::table('postitus_vaade')->where('kasutaja', $user->kasutajanimi)->sum('reiting');


        return view('profile',['name' => $user], ['reiting' => $reiting])->with('postitusKasutaja',$postitusKasutaja );



    }

    public function storeImg(Request $request) {

        //Kui kasutaja ei muuda enda emaili ja nime!
        if($request->email==auth()->user()->email && $request->kasutajanimi==auth()->user()->kasutajanimi) {
            $this->validate($request, [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'kasutajanimi' => 'required',
                'email' => 'required',
            ]);

        }
        //Kui kasutaja ei muuda enda nime
        else if ($request->kasutajanimi==auth()->user()->kasutajanimi)  {
            $this->validate($request, [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'kasutajanimi' => 'required',
                'email' => 'unique:kasutajad|email|required',
            ]);
        }
        //kasutaja ei muuda enda meili
        else if ($request->email==auth()->user()->email) {
            $this->validate($request, [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'kasutajanimi' => 'required|unique:kasutajad',
                'email' => 'required',
            ]);
        }

        //kasutaja muudab mõlemat
        else {
        $this->validate($request, [
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kasutajanimi' => 'required|unique:kasutajad',
            'email' => 'unique:kasutajad|email|required',
        ]);}


        if (empty($request->avatar)) {
            DB::select('CALL changeProfile (?,?,?,?)',array(auth()->user()->avatar,auth()->user()->id,$request->kasutajanimi, $request->email));
        }
        else {
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('pictures/profilePics'), $imageName);
            DB::select('CALL changeProfile (?,?,?,?)',array('/../public/pictures/profilePics/'.$imageName, auth()->user()->id,$request->kasutajanimi, $request->email));}

       //suunamine edasi proofilile
        return redirect('/profile/'.$request->kasutajanimi);

    }
}