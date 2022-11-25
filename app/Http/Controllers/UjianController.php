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
        $username_ujian_terpakai = array();
        foreach (Ujian::all() as $ujian) {
            if ($ujian->username) {
                array_push($username_ujian_terpakai, $ujian->username);
            }
        }

        $daftar_user = User::select('username', 'name')->whereNotIn('username', $username_ujian_terpakai)->get();
        $daftar_user = $daftar_user->map(function ($user) {
            return ['id' => $user->username, 'text' => $user->name . ' (' . $user->username . ')' ];
        })->toArray();

        return view('ujian', [
            'username' => $this->username,
            'daftar_user' => $daftar_user,
            'daftar_ujian' => Ujian::all(),
        ]);
    }

    public function createOrUpdate(Request $request) {
        // Shortcut ke variabel penting
        $username = $request->input('username');
        $old_username = $request->input('old_username');

        // Validasi form
        $request->validate([
            'username' => 'required|string',
            'datetime_mulai' => 'required|date_format:Y-m-d H:i',
            'datetime_akhir' => 'nullable|date_format:Y-m-d H:i',
            'old_username' => 'nullable|string',
        ]);

        // Perbarui atau buat model baru
        $ujian = Ujian::where('username', '=', $username)->first();
        if (!$ujian) $ujian = new Ujian();

        $ujian->username = $username;
        $ujian->datetime_mulai = $request->input('datetime_mulai');
        $ujian->datetime_akhir = $request->input('datetime_akhir');
        $ujian->save();

        // Hapus model lama
        if ($old_username && $old_username != $username) 
            Ujian::where('username', '=', $old_username)->first()->delete();

        return redirect()->route('ujian');
    }

    public function delete(Request $request) {
        // Shortcut ke variabel penting
        $username = $request->input('username');

        // Validasi form
        $request->validate([
            'username' => 'required|string',
        ]);

        // Hapus model bila ditemukan
        $ujian = Ujian::where('username', '=', $username)->first();
        if ($ujian) $ujian->delete();

        return redirect()->route('ujian');
    }
}
