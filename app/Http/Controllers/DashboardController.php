<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Roles;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $absensi = Absensi::where('nama', $user->name)->get();
        $countGaji = $absensi->count() > 0 ? $absensi->sum('gaji') : 0;
        $countJamKerja = $absensi->count() > 0 ? $absensi->sum('total') : 0;
        $roles = Roles::all();
        return view('dashboard', compact('user','absensi','countGaji','countJamKerja','roles'));
    }
}
