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
        $reiting = DB::table('postitus_vaade')->where('kasutaja', $user->kasutajanimi)->sum('reiting');


        return view('profile',['name' => $user], ['reiting' => $reiting])->with('postitusKasutaja',$postitusKasutaja );



    }

    public function storeImg(Request $request) {

        //Laravel validator, best thing since sliced bread, kurb, et alles praegu avastasin
        $this->validate($request, [
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'unique:users|email|required',
        ]);


        if (empty($request->avatar)) {
            DB::select('CALL changeProfile (?,?,?,?)',array(auth()->user()->avatar,auth()->user()->id,$request->name, $request->email));
        }
        else {
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('pictures/profilePics'), $imageName);
            DB::select('CALL changeProfile (?,?,?,?)',array('/../LAFF/public/pictures/profilePics/'.$imageName, auth()->user()->id,$request->name, $request->email));}

       //suunamine edasi proofilile
        return redirect('/profile/'.$request->name);

    }
}