<?php

use App\Http\Controllers\ApiAbsensiController;
use App\Http\Controllers\ApiCutiController;
use App\Http\Controllers\ApiGajiController;
use App\Http\Controllers\ApiPegawaiController;
use App\Http\Controllers\ApiPelangganController;
use App\Http\Controllers\ApiPencatatanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login',  [AuthController::class, 'login']);
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    // Routes for Pegawai
    Route::get('/pegawai', [ApiPegawaiController::class, 'index']);  // List all pegawai
    Route::post('/pegawai', [ApiPegawaiController::class, 'store']); // Create new pegawai
    Route::get('/pegawai/{id}', [ApiPegawaiController::class, 'show']); // Show a specific pegawai
    Route::put('/pegawai/{id}', [ApiPegawaiController::class, 'update']); // Update a specific pegawai
    Route::delete('/pegawai/{id}', [ApiPegawaiController::class, 'destroy']); // Delete a specific pegawai

    // Routes for Pelanggan
    Route::get('/pelanggan', [ApiPelangganController::class, 'index']); // List all pelanggan
    Route::post('/pelanggan', [ApiPelangganController::class, 'store']); // Create new pelanggan
    Route::get('/pelanggan/{id}', [ApiPelangganController::class, 'show']); // Show a specific pelanggan
    Route::put('/pelanggan/{id}', [ApiPelangganController::class, 'update']); // Update a specific pelanggan
    Route::delete('/pelanggan/{id}', [ApiPelangganController::class, 'destroy']); // Delete a specific pelanggan

    // Routes for Pencatatan
    Route::get('/pencatatan', [ApiPencatatanController::class, 'index']); // List all pencatatan
    Route::post('/pencatatan', [ApiPencatatanController::class, 'store']); // Create new pencatatan
    Route::get('/pencatatan/{id}', [ApiPencatatanController::class, 'show']); // Show a specific pencatatan
    Route::put('/pencatatan/{id}', [ApiPencatatanController::class, 'update']); // Update a specific pencatatan
    Route::delete('/pencatatan/{id}', [ApiPencatatanController::class, 'destroy']); // Delete a specific pencatatan

    // Routes for Absensi
    Route::get('/absensi', [ApiAbsensiController::class, 'index']); // List all absensi
    Route::post('/absensi', [ApiAbsensiController::class, 'store']); // Create new absensi
    Route::get('/absensi/{id}', [ApiAbsensiController::class, 'show']); // Show a specific absensi
    Route::put('/absensi/{id}', [ApiAbsensiController::class, 'update']); // Update a specific absensi
    Route::delete('/absensi/{id}', [ApiAbsensiController::class, 'destroy']); // Delete a specific absensi

    // Routes for Gaji
    Route::get('/gaji', [ApiGajiController::class, 'index']); // List all gaji
    Route::post('/gaji', [ApiGajiController::class, 'store']); // Create new gaji
    Route::get('/gaji/{id}', [ApiGajiController::class, 'show']); // Show a specific gaji
    Route::put('/gaji/{id}', [ApiGajiController::class, 'update']); // Update a specific gaji
    Route::delete('/gaji/{id}', [ApiGajiController::class, 'destroy']); // Delete a specific gaji

    // Routes for Cuti
    Route::get('/cuti', [ApiCutiController::class, 'index']); // List all cuti
    Route::post('/cuti', [ApiCutiController::class, 'store']); // Create new cuti
    Route::get('/cuti/{id}', [ApiCutiController::class, 'show']); // Show a specific cuti
    Route::put('/cuti/{id}', [ApiCutiController::class, 'update']); // Update a specific cuti
    Route::delete('/cuti/{id}', [ApiCutiController::class, 'destroy']); // Delete a specific cuti

    Route::get('/hitung-gaji', [ApiGajiController::class, 'createPegawai'])->name('hitung-gaji');
    Route::get('/persetujuan-cuti/{id}', [ApiCutiController::class, 'persetujuanCuti'])->name('persetujuan-cuti');
    Route::get('/filter-absensi/{id}', [ApiAbsensiController::class, 'filterByMonth'])->name('filter-absensi');
    Route::get('/filter-gaji/{id}', [ApiGajiController::class, 'filterByMonth'])->name('filter-gaji');
    Route::get('/jabatanDanCabang', [ApiPegawaiController::class, 'jabatanDanCabang'])->name('jabatanDanCabang');
    Route::get('/jumlah-absensi/{id}', [ApiAbsensiController::class, 'hitungAbsensi'])->name('hitung-absensi');



});
