<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\BiodataController;

use App\Models\User;
use App\Models\Biodata;
use App\Models\BiodataOrtu;
use App\Models\Dokumen;
use App\Models\Wali;

class AnggotaController extends Controller
{
    public $username;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->username = Auth::user()->username;
            return $next($request);
        });
    }

    public function index()
    {
        $Biodata = Biodata::all();
        $User = User::all();
        $Dokumen = Dokumen::all();

        return view('anggota',['username' => $this->username], compact('Biodata','User','Dokumen'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $User = new User;
        $User->name = $request->input('name');
        $User->username = $request->input('username');
        $User->password = Hash::make($request->input('password'));
        $User->save();

        $Biodata = new Biodata;
        $Biodata->username = $request->input('username');
        $Biodata->sabuk = $request->input('sabuk');
        $Biodata->tgl_lahir = $request->input('tgl');
        $Biodata->alamat = $request->input('alamat');
        $Biodata->save();

        $Wali = new Wali;
        $Wali->username = $request->input('username');
        $Wali->save();

        return redirect('anggota')->with('Success', 'Data Saved');
    }

    public function stored(Request $request, $username)
    {

        $Dokumen = new Dokumen;
        $Dokumen->username = $request->input('username');
        $Dokumen->username = $request->input('username');

        return redirect('anggota')->with('Success', 'Data Saved');
    }

    // public function update(Request $request, $username)
    // {
    //     $this->validate($request,[
    //         'name' => 'required',
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $User = User::where('username',$username)->first();
    //     if ($User != null) {
    //         $User->delete();
    //     }

    //     $User = new User;
    //     $User->name = $request->input('name');
    //     $User->username = $request->input('username');
    //     $User->password = Hash::make($request->input('password'));
    //     $User->save();

    //     $Biodata = new Biodata;
    //     $Biodata->username = $request->input('username');
    //     $Biodata->sabuk = $request->input('sabuk');
    //     $Biodata->tgl_lahir = $request->input('tgl');
    //     $Biodata->alamat = $request->input('alamat');
    //     $Biodata->save();

    //     return redirect(route('anggota'));
    // }

    public function update(Request $request, $username)
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $User = User::where('username', $username)->first();
        $User->name = $request->input('name');
        $User->username = $request->input('username');
        $User->password = Hash::make($request->input('password'));
        $User->save();

        $Biodata = Biodata::where('username', $username)->first();
        $Biodata->username = $request->input('username');
        $Biodata->sabuk = $request->input('sabuk');
        $Biodata->tgl_lahir = $request->input('tgl');
        $Biodata->alamat = $request->input('alamat');
        $Biodata->save();

        return redirect(route('anggota'));
    }

    public function destroy($username)
    {
        $User = User::where('username',$username)->first();

        if ($User != null) {
            $User->delete();
            return redirect()->route('anggota')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('anggota')->with(['message'=> 'Error']);
    }


    public function indexw() {
        $Biodata = Biodata::all();
        $User = User::all();
        return view('/datawali',['username' => $this->username], compact('Biodata','User'));
    }
}
