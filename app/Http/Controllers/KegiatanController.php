<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public $username;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->username = Auth::user()->username;
            return $next($request);
        });
    }

    public function index() {
        return view('kegiatan', [
            'username' => $this->username,
            'daftar_kegiatan' => Kegiatan::all(),
        ]);
    }
    
    public function createOrUpdate(Request $request) {
        // Shortcut ke variabel penting
        $id = $request->input('id');

        // Validasi form
        $request->validate([
            // Bila bukan bertipe lomba maka wajib diisi
            'nama_kegiatan' => 'required_if:is_lomba,0,true',
            'datetime_mulai' => 'required|date_format:Y-m-d H:i',
            'datetime_akhir' => 'nullable|date_format:Y-m-d H:i',
            'is_lomba' => 'required|boolean',
            // Bila bukan bertipe lomba maka tidak wajib diisi
            'id_lomba' => 'required_if:is_lomba,0,false',
        ]);

        // Perbarui atau buat model baru
        $kegiatan = Kegiatan::where('id', '=', $id)->first();
        if (!$kegiatan) $kegiatan = new Kegiatan();

        $kegiatan->nama_kegiatan = $request->input('nama_kegiatan');
        $kegiatan->datetime_mulai = $request->input('datetime_mulai');
        $kegiatan->datetime_akhir = $request->input('datetime_akhir');
        $kegiatan->is_lomba = $request->input('is_lomba');
        $kegiatan->id_lomba = $request->input('id_lomba');
        
        $kegiatan->save();

        return redirect()->route('kegiatan');
    }

    public function delete(Request $request) {
        // Shortcut ke variabel penting
        $id = $request->input('id');

        // Validasi form
        $request->validate([
            'id' => 'required|numeric',
        ]);

        // Perbarui atau buat model baru
        $kegiatan = Kegiatan::where('id', '=', $id)->first();
        if ($kegiatan) $kegiatan->delete();

        return redirect()->route('kegiatan');
    }
}
