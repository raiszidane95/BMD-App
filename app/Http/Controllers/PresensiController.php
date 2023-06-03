<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $users = User::all();
        $absensi = Absensi::all();
        return view('presensi', compact('user','absensi','users'));
    }
}
