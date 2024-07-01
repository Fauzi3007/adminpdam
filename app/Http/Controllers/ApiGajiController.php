<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = Gaji::all();
        return response()->json($gaji);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal' => 'required|date',
            'gaji_pokok' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric',
            'tunjangan_anak' => 'required|numeric',
            'tunjangan_nikah' => 'required|numeric',
            'potongan' => 'required|numeric',
            'pajak' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);


        Gaji::create($validated);

        return response()->json(['message' => 'Gaji created successfully!'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gaji = Gaji::where('id_pegawai',$id)->first();
        if (!$gaji) {
            return response()->json(['message' => 'Gaji not found'], 404);
        }
        return response()->json($gaji);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $gaji = Gaji::find($id);
        if (!$gaji) {
            return response()->json(['message' => 'Gaji not found'], 404);
        }

        $validated = $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal' => 'required|date',
            'gaji_pokok' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric',
            'tunjangan_anak' => 'required|numeric',
            'tunjangan_nikah' => 'required|numeric',
            'potongan' => 'required|numeric',
            'pajak' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);


        $gaji->update($validated);

        return response()->json(['message' => 'Gaji updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gaji = Gaji::find($id);
        if (!$gaji) {
            return response()->json(['message' => 'Gaji not found'], 404);
        }
        $gaji->delete();
        return response()->json(['message' => 'Gaji deleted successfully!'], 200);

    }

    /**
     * Create Pegawai's salary details.
     */
    public function createPegawai(Request $request)
    {
        $pegawai = Pegawai::find($request->id_pegawai);
        if (!$pegawai) {
            return response()->json(['message' => 'Pegawai not found'], 404);
        }

        $gaji_pokok = $pegawai->gaji_pokok;
        $jabatan = Jabatan::find($pegawai->jabatan);
        $tunjangan_jabatan = $jabatan ? $jabatan->tunjangan_jabatan : 0;
        $status = $pegawai->status_nikah;
        $anak = $pegawai->jumlah_anak;

        $tunjangan_nikah = 0.00;
        $tunjangan_anak = 0.00;

        if ($status == 'Menikah') {
            $tunjangan_nikah = 200000.00;
            if ($anak == 1) {
                $tunjangan_anak = 100000.00;
            } elseif ($anak == 2) {
                $tunjangan_anak = 200000.00;
            } elseif ($anak > 2) {
                $tunjangan_anak = 300000.00;
            }
        }

        $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $absensi = Absensi::where('id_pegawai', $pegawai->id)
            ->whereIn('keterangan', ['Izin', 'Sakit', 'Cuti'])
            ->whereBetween('tanggal', [$firstDayOfLastMonth, $lastDayOfLastMonth])
            ->count();

        $potongan = $absensi > 0 ? 100000 * $absensi : 0;

        $pajak = 0.12 * ($gaji_pokok + $tunjangan_jabatan + $tunjangan_nikah + $tunjangan_anak - $potongan);
        $total_gaji = $gaji_pokok + $tunjangan_jabatan + $tunjangan_nikah + $tunjangan_anak - $potongan - $pajak;

        $data = [
            'pegawai' => $pegawai,
            'gaji_pokok' => $gaji_pokok,
            'tunjangan_jabatan' => $tunjangan_jabatan,
            'tunjangan_anak' => $tunjangan_anak,
            'tunjangan_nikah' => $tunjangan_nikah,
            'potongan' => $potongan,
            'pajak' => $pajak,
            'total_gaji' => $total_gaji,
        ];

        return response()->json($data, 200);
    }

}
