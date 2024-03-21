<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\CutiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PencatatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/absensi', AbsensiController::class, ['names' => 'absensi']);
    Route::resource('/cabang', CabangController::class, ['names' => 'cabang']);
    Route::resource('/cuti', CutiController::class, ['names' => 'cuti']);
    Route::resource('/gaji', GajiController::class, ['names' => 'gaji']);
    Route::resource('/jabatan', JabatanController::class, ['names' => 'jabatan']);
    Route::resource('/laporan', LaporanController::class, ['names' => 'laporan']);
    Route::resource('/pegawai', PegawaiController::class, ['names' => 'pegawai']);
    Route::resource('/pelanggan', PelangganController::class, ['names' => 'pelanggan']);
    Route::resource('/pencatatan', PencatatanController::class, ['names' => 'pencatatan']);

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});
