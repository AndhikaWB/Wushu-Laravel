<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public $username;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->username = Auth::user()->username;
            return $next($request);
        });
    }

    public function index()
    {
        $anggota = User::where('is_admin', 0)->count();
        $pelatih = User::where('is_admin', 1)->count();

        return view('home', [
            // Returned as collection
            'username' => $this->username,
            'anggota' => $anggota,
            'pelatih' => $pelatih,
        ]);
    }
}
