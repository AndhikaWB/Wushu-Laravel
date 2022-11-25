<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kegiatan;
use App\Models\Lomba;

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
        $id_lomba_terpakai = array();
        foreach (Kegiatan::all() as $kegiatan) {
            if ($kegiatan->id_lomba) {
                array_push($id_lomba_terpakai, $kegiatan->id_lomba);
            }
        }

        $daftar_lomba = Lomba::select('id', 'nama_lomba')->whereNotIn('id', $id_lomba_terpakai)->get();
        $daftar_lomba = $daftar_lomba->map(function ($lomba) {
            return ['id' => $lomba->id, 'text' => $lomba->nama_lomba];
        })->toArray();

        return view('kegiatan', [
            'username' => $this->username,
            'daftar_kegiatan' => Kegiatan::all(),
            'daftar_lomba' => $daftar_lomba
        ]);
    }

    public function _checkKegiatanOrLomba(Request $request) {
       // Hanya boleh angka tanpa string
       if ($request->input('is_lomba')) return 'required|integer';
       // Boleh ada angka selama string tidak hanya berupa angka   
       return 'required|string|not_regex:/\d+$/'; 
    }

    public function createOrUpdate(Request $request) {
        // Shortcut ke variabel penting
        $id = $request->input('id');

        // Validasi form
        $request->validate([
            'datetime_mulai' => 'required|date_format:Y-m-d H:i',
            'datetime_akhir' => 'nullable|date_format:Y-m-d H:i',
            'is_lomba' => 'required|boolean',

            // Bila bukan berupa lomba maka tidak wajib diisi
            // 'id_lomba' => 'required_if:is_lomba,0,false',
            // Bila bukan berupa lomba maka wajib diisi
            // 'nama_kegiatan' => 'required_if:is_lomba,0,true',

            // https://stackoverflow.com/a/46892019
            // https://stackoverflow.com/a/59065975
            'nama_kegiatan' => $this->_checkKegiatanOrLomba($request),

            'old_is_lomba' => 'nullable|boolean',
            'old_nama_kegiatan' => 'nullable|string',
        ]);

        // Perbarui atau buat model baru
        $kegiatan = Kegiatan::where('id', '=', $id)->first();
        if (!$kegiatan) $kegiatan = new Kegiatan();

        $kegiatan->datetime_mulai = $request->input('datetime_mulai');
        $kegiatan->datetime_akhir = $request->input('datetime_akhir');
        $kegiatan->is_lomba = $request->input('is_lomba');

        if ($kegiatan->is_lomba) {
            // Jika berupa lomba maka id lomba akan disimpan
            // Id lomba tetap disimpan pada form select "nama_kegiatan"
            $kegiatan->id_lomba = $request->input('nama_kegiatan');
            $kegiatan->nama_kegiatan = null;
        } else {
            // Jika bukan berupa lomba maka nama kegiatan akan disimpan
            $kegiatan->nama_kegiatan = $request->input('nama_kegiatan');
            $kegiatan->id_lomba = null;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan');
    }

    public function delete(Request $request) {
        // Shortcut ke variabel penting
        $id = $request->input('id');

        // Validasi form
        $request->validate([
            'id' => 'required|integer',
        ]);

        // Hapus model bila ditemukan
        $kegiatan = Kegiatan::where('id', '=', $id)->first();
        if ($kegiatan) $kegiatan->delete();

        return redirect()->route('kegiatan');
    }
}
