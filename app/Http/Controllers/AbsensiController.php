<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $now = Carbon::now()->setTimezone('Asia/Jakarta')->format('l');
        $date = Carbon::now()->setTimezone('Asia/Jakarta')->format('y-m-d'); 
        $absensiByAuth = Absensi::where('nama', $user->name)->where('tanggal', $date)->first();
        // dd($absensiByAuth);
        $absensi = Absensi::all()->where('nama', $user->name);
        return view('absensi', compact('user', 'absensi', 'now', 'date', 'absensiByAuth'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $now = Carbon::now()->setTimezone('Asia/Jakarta')->format('l');
        $absensi = new Absensi;
        $absensi->nama = $user->name ;
        $absensi->hari = $now ;
        $absensi->tanggal = $request->tanggal;
        $absensi->checkin = Carbon::now('Asia/Jakarta')->format('H:i:s');
        $absensi->save();
        return redirect()->back()->with('success', 'Data checkin berhasil disimpan!');
    }

    public function checkout(Request $request)
    {
        $user = auth()->user();
        $date = Carbon::now()->setTimezone('Asia/Jakarta')->format('y-m-d'); 
        $absensiByAuth = Absensi::where('nama', $user->name)->where('tanggal', $date)->first();


        if ($absensiByAuth) {
            $absensiByAuth->checkout = Carbon::now('Asia/Jakarta')->format('H:i:s');
            $absensiByAuth->total = strtotime($absensiByAuth->checkout) - strtotime($absensiByAuth->checkin);
            $absensiByAuth->gaji = ($user->role->name == "KT" ? ($absensiByAuth->total/3600)*10000 : ($absensiByAuth->total/3600)*8000 );
            $absensiByAuth->update();

            return redirect()->back()->with('success', 'Data checkout berhasil disimpan!');
        }
    } 

}
