<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $absensi = Absensi::all();
        $user = auth()->user();
        // $userByName = User::all()->where('nama');
        // $absensi = Absensi::where('nama', $userByName)->get();
        // $countGaji = $absensi->count() > 0 ? $absensi->sum('gaji') : 0;
        // $countJamKerja = $absensi->count() > 0 ? $absensi->sum('total') : 0;
        return view('karyawan', compact('user','absensi','users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/karyawan');
    }
}
