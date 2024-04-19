<?php

use App\Http\Controllers\ApiAbsensiController;
use App\Http\Controllers\ApiCutiController;
use App\Http\Controllers\ApiGajiController;
use App\Http\Controllers\ApiPegawaiController;
use App\Http\Controllers\ApiPelangganController;
use App\Http\Controllers\ApiPencatatanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/pegawai', ApiPegawaiController::class);
Route::apiResource('/pelanggan', ApiPelangganController::class);
Route::apiResource('/pencatatan', ApiPencatatanController::class);
Route::apiResource('/absensi', ApiAbsensiController::class);
Route::apiResource('/gaji', ApiGajiController::class);
Route::apiResource('/cuti', ApiCutiController::class);
