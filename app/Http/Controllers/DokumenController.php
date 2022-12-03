<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Dokumen;
use App\Models\User;

class DokumenController extends Controller
{
    public $username;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->username = Auth::user()->username;
            return $next($request);
        });
    }

    public function index(){

        //ambil data dari database
        $duda = Dokumen::all();
        //passing data ke view
        return view('anggota')->with('duda', $duda);
    }

    public function store(Request $request, $username){

        $this->validate($request, [
            'file'=>'required',
            'kategori'=>'required'
        ]);

        $file           = $request->file('file');
        $nama_file      = $file->getClientOriginalName();
        $file->move('file_upload',$file->getClientOriginalName());


        $Dokumen = new Dokumen;
        $Dokumen->username = $username;
        $Dokumen->file = $nama_file;
        $Dokumen->kategori = $request->input('kategori');
        $Dokumen->save();

        return redirect()->back();
    }

    public function destroy($id)
    {

        // $Dokumen = Dokumen::where('id',$id)->first();
	    // Dokumen::delete('file_upload/'.$Dokumen->file);

        Dokumen::where('id',$id)->delete();

        return redirect()->back();
    }
}
