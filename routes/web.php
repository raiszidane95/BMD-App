<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/absensi', [App\Http\Controllers\AbsensiController::class, 'index'])->name('absensi.index');
Route::post('/absensi', [App\Http\Controllers\AbsensiController::class, 'store'])->name('absensi.store');
Route::post('/absensi/update', [App\Http\Controllers\AbsensiController::class, 'checkout'])->name('absensi.checkout');
Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan.index');
Route::delete('/karyawan/{id}', [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.destroy');
Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('presensi.index');
