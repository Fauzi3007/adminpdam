<?php

use App\Actions\Fortify\UpdateUserPassword;
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
use App\Http\Controllers\PenggunaController;

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

    Route::resource('/absensi', AbsensiController::class);
    Route::resource('/cabang', CabangController::class);
    Route::resource('/cuti', CutiController::class);
    Route::resource('/gaji', GajiController::class);
    Route::get('/hitung-gaji', [GajiController::class, 'createPegawai'])->name('hitung-gaji');
    Route::resource('/jabatan', JabatanController::class);
    Route::resource('/laporan', LaporanController::class);
    Route::resource('/pegawai', PegawaiController::class);
    Route::resource('/pelanggan', PelangganController::class);
    Route::resource('/pencatatan', PencatatanController::class);
    Route::resource('/user', PenggunaController::class);

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});
