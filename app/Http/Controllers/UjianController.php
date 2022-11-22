<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ujian;
use App\Models\User;

class UjianController extends Controller
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
        return view('ujian', [
            'username' => $this->username,
            'daftar_user' => User::all(),
            'daftar_ujian' => Ujian::all(),
        ]);
    }

    public function createOrUpdate(Request $request) {
        // Shortcut ke variabel penting
        $username = $request->input('username');

        // Validasi form
        $request->validate([
            'username' => 'required',
            'datetime_mulai' => 'required|date_format:Y-m-d H:i',
            'datetime_akhir' => 'nullable|date_format:Y-m-d H:i',
        ]);

        // Perbarui atau buat model baru
        $ujian = Ujian::where('username', '=', $username)->first();
        if (!$ujian) $ujian = new Ujian();

        $ujian->username = $username;
        $ujian->datetime_mulai = $request->input('datetime_mulai');
        $ujian->datetime_akhir = $request->input('datetime_akhir');
        $ujian->save();

        return redirect()->route('ujian');
    }

    public function delete(Request $request) {
        // Shortcut ke variabel penting
        $username = $request->input('username');

        // Validasi form
        $request->validate([
            'username' => 'required',
        ]);

        // Perbarui atau buat model baru
        $ujian = Ujian::where('username', '=', $username)->first();
        if ($ujian) $ujian->delete();

        return redirect()->route('ujian');
    }
}
