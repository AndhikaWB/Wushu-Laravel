<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\BiodataController;

use App\Models\Prestasi;
use App\Models\User;

class PrestasiController extends Controller
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
        // dd($User);
        $Prestasi = Prestasi::all();
        // dd($Prestasi);

        return view('prestasi',['username' => $this->username], compact('Prestasi','User'));
    }

    public function store(Request $request, $username)
    {

        $Prestasi = new Prestasi;
        $Prestasi->username = $username;
        $Prestasi->prestasi = $request->input('prestasi');
        $Prestasi->tingkat = $request->input('tingkatan');
        $Prestasi->save();


        return redirect()->route('prestasi',['Username' => $username])->with(['message'=> 'Successfully deleted!!']);
    }

    public function destroy($id, $username)
    {
        $Prestasi = Prestasi::where('id',$id)->first();
        $User = User::where('username',$username)->first();
        if ($Prestasi != null) {
            $Prestasi->delete();
            return redirect()->route('prestasi',['Username' => $username])->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('prestasi')->with(['message'=> 'Error']);
    }

    public function update(Request $request, $id, $username)
    {
        $this->validate($request,[
            'prestasi' => 'required',
            'tingkatan' => 'required',
        ]);

        $Prestasi = Prestasi::where('id',$id)->first();

        $Prestasi->prestasi = $request->input('prestasi');
        $Prestasi->tingkat = $request->input('tingkatan');
        $Prestasi->save();

        return redirect()->route('prestasi',['Username' => $username])->with(['message'=> 'Successfully Update!!']);
    }
}
