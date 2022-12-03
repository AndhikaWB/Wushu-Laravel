<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Wali;
use App\Models\Dokumen;

class BiodataController extends Controller
{
    public $username;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->username = Auth::user()->username;
            return $next($request);
        });
    }

    public function index() {

        // $Biodataortu = Ortu::all();

        $Biodata = Biodata::where('username',$this->username)->first();
        $User = User::where('username',$this->username)->first();
        $Wali = Wali::where('username',$this->username)->first();
        $Dokumen = Dokumen::All();

        return view('/biodata',['username' => $this->username], compact('Biodata','User','Wali','Dokumen'));
    }

    public function getAkun($username) {
        return User::where('username', '=', $username)->first();
    }

    public function getAll() {
        return Biodata::join('biodata_ortu', 'biodata_ortu.username', '=', 'biodata.username')
            ->join('dokumen', 'dokumen.username', '=', 'biodata.username')
            ->get();
    }

    public function getBiodata($username) {
        return Biodata::where('username', '=', $username)->firstOrCreate([
            'username' => $this->username,
            'sabuk' => 'Putih',
            'tgl_lahir' => '2000-01-01',
            'alamat' => 'Lampung Selatan'
        ]);
    }

    public function getBiodataOrtu($username) {
        return BiodataOrtu::where('username', '=', $username)->firstOrCreate([
            'username' => $this->username,
            'nama_wali' => 'John Doe',
            'no_hp' => '08123456789'
        ]);
    }

    public function getDokumen($username) {
        return Dokumen::where('username', '=', $username);
    }

    public function updateAkun(Request $request, $username) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$username,
            'password' => 'sometimes|nullable|confirmed'
        ]);

        $user = User::where('username', '=', $username)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('biodata.showPage')
            ->with('success_message', 'Berhasil mengubah informasi akun');
    }

    public function update(Request $request, $username)
    {
        $User = User::where('username', $username)->first();
        $User->name = $request->input('name');
        $User->save();

        $Biodata = Biodata::where('username', $username)->first();
        $Biodata->sabuk = $request->input('sabuk');
        $Biodata->alamat = $request->input('alamat');
        $Biodata->save();

        $Wali = Wali::where('username', $username)->first();
        $Wali->nama_wali = $request->input('wali');
        $Wali->no_hp = $request->input('no_hp');
        $Wali->no_wali = $request->input('no_wali');
        $Wali->save();

        return redirect(route('biodata'));
    }

    public function upload(Request $request, $username)
    {

        $file           = $request->file('file');
        if(empty($file)){
            return redirect()->back();
        }

        $nama_file      = $file->getClientOriginalName();
        $file->move('profile',$file->getClientOriginalName());

        $User = User::where('username', $username)->first();
        $User->profile = $nama_file;
        $User->save();

        return redirect()->back();
    }

    public function updateBiodata(Request $request, $username) {
        $request->validate([
            'sabuk' => 'required',
            'tgl_lahir' => 'required|date_format:Y-m-d|before:5 years ago',
            'alamat' => 'required',
            'prestasi' => 'nullable',
            'nama_wali' => 'required',
            'no_hp' => 'required|numeric|min:10',
        ]);

        $biodata = Biodata::where('username', '=', $username)->first();
        $biodata->sabuk = $request->sabuk;
        $biodata->tgl_lahir = $request->tgl_lahir;
        $biodata->alamat = $request->alamat;
        $biodata->prestasi = $request->prestasi;
        $biodata->save();

        $biodata_ortu = BiodataOrtu::where('username', '=', $username)->first();
        $biodata_ortu->nama_wali = $request->nama_wali;
        $biodata_ortu->no_hp = $request->no_hp;
        $biodata->save();

        return redirect()->route('biodata.showPage')
            ->with('success_message', 'Berhasil mengubah informasi biodata');
    }
}
