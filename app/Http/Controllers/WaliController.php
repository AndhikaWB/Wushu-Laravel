<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\BiodataController;

use App\Models\Wali;
use App\Models\User;

class WaliController extends Controller
{
    public $username;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->username = Auth::user()->username;
            return $next($request);
        });
    }

    public function index($username) {

        $User = User::where('username',$username)->first();
        $Wali = Wali::all();

        return view('wali',['username' => $this->username], compact('Wali','User'));
    }

    public function store(Request $request, $username)
    {

        $Wali = new Wali;
        $Wali->username = $username;
        $Wali->nama_wali = $request->input('nama_wali');
        $Wali->no_hp = $request->input('no_hp');
        $Wali->save();


        return redirect()->route('wali',['Username' => $username])->with(['message'=> 'Successfully deleted!!']);
    }

    public function destroy($id, $username)
    {
        $Wali = Wali::where('id',$id)->first();
        $User = User::where('username',$username)->first();
        if ($Wali != null) {
            $Wali->delete();
            return redirect()->route('wali',['Username' => $username])->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('wali')->with(['message'=> 'Error']);
    }

    public function update(Request $request, $id, $username)
    {
        $this->validate($request,[
            'nama_wali' => 'required',
            'no_hp' => 'required',
        ]);

        $Wali = Wali::where('id',$id)->first();

        $Wali->nama_wali = $request->input('nama_wali');
        $Wali->no_hp = $request->input('no_hp');
        $Wali->save();

        return redirect()->route('wali',['Username' => $username])->with(['message'=> 'Successfully Update!!']);
    }
}
