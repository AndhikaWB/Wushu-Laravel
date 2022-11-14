<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Biodata;
use App\Models\BiodataOrtu;
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
        $akun = $this->getAkun($this->username);
        $biodata = $this->getBiodata($this->username);
        $biodata = $this->getBiodataOrtu($this->username);
        $dokumen = $this->getDokumen($this->username);

        return view('biodata', [
            'name' => $akun->name,
            'username' => $akun->username,
            'password'=> $akun->password,
            'is_admin' => $akun->is_admin,

            'sabuk' => $biodata->sabuk,
            'tgl_lahir' => $biodata->tgl_lahir,
            'alamat' => $biodata->alamat,
            'prestasi' => $biodata->prestasi,

            'nama_wali' => $biodata->prestasi,
            'no_hp' => $biodata->prestasi,

            'dokumen' => $dokumen,
        ]);
    }

    public function getAkun($username) {
        return User::where('username', '=', $username)->first();
    }

    public function getAll() {
        return Biodata::join('biodata_ortu', 'biodata_ortu.username', '=', 'biodata.username')
            ->join('dokumen', 'dokumen.username', '=', 'biodata.username')->get();
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

    // https://ralphjsmit.com/laravel-validation
    // https://stackoverflow.com/questions/38326282/validating-multiple-files-in-array

    // public function updateDokumen(Request $request, $username) {
    //     foreach($request->dokumen as $dok) {
    //         $rules = array('file' => 'required|mimes:png,jpg,pdf,docx');
    //         $dokumen = Dokumen::where('username', '=', $username)->
    //                     where('kategori', '=', $dok->kategori)->first();
    //         $validator = Validator::make(array('file'=> $dok), $rules);
    //             if ($validator->passes()){
    //                 $destinationPath = 'uploads';
    //                 $filename = $dok->getClientOriginalName();
    //                 $upload_success = $dok->move($destinationPath, $filename);
    //             }
    //     }
    // }
}
