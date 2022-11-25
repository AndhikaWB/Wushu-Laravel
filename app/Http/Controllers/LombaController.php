<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lomba;

class LombaController extends Controller
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
        return view('lomba', [
            'username' => $this->username,
            'daftar_lomba' => Lomba::all(),
        ]);
    }
    
    public function createOrUpdate(Request $request) {
        // Shortcut ke variabel penting
        $id = $request->input('id');

        // Validasi form
        $request->validate([
            'id' => 'nullable|integer',
            'nama_lomba' => 'required|string',
            'kategori' => 'required|array',
            'tingkatan' => 'required|string',
            'lokasi' => 'required|string'
        ]);

        // Perbarui atau buat model baru
        $lomba = Lomba::where('id', '=', $id)->first();
        if (!$lomba) $lomba = new Lomba();

        $lomba->nama_lomba = $request->input('nama_lomba');
        $lomba->kategori = $request->input('kategori');
        $lomba->tingkatan = $request->input('tingkatan');
        $lomba->lokasi = $request->input('lokasi');
        $lomba->save();

        return redirect()->route('lomba');
    }

    public function delete(Request $request) {
        // Shortcut ke variabel penting
        $id = $request->input('id');

        // Validasi form
        $request->validate([
            'id' => 'required|integer',
        ]);

        // Hapus model bila ditemukan
        $lomba = Lomba::where('id', '=', $id)->first();
        if ($lomba) $lomba->delete();

        return redirect()->route('lomba');
    }
}
