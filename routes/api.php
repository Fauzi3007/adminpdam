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

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login',  [AuthController::class, 'login']);
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::apiResource('/pegawai', ApiPegawaiController::class);
    Route::apiResource('/pelanggan', ApiPelangganController::class);
    Route::apiResource('/pencatatan', ApiPencatatanController::class);
    Route::apiResource('/absensi', ApiAbsensiController::class);
    Route::apiResource('/gaji', ApiGajiController::class);
    Route::get('/hitung-gaji', [ApiGajiController::class, 'createPegawai'])->name('hitung-gaji');
    Route::apiResource('/cuti', ApiCutiController::class);
});


