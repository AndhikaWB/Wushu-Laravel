<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BiodataController;

class AnggotaController extends Controller
{
    public $username;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->username = Auth::user()->username;
            return $next($request);
        });
    }

    public function index() {
        $b = new BiodataController();
        $daftar_anggota = $b->getAll();

        return view('anggota', [
            'username' => $this->username,
            'anggota' => $daftar_anggota,
        ]);
    }
}
