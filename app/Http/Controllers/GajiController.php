<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $gajis = Gaji::all();
        return view('pages.gaji.index', compact('gajis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('pages.gaji.create',compact('pegawais'));
    }

    public function createPegawai(Request $request)
    {
        $pegawai = Pegawai::find($request->id_pegawai);
        $pegawais = Pegawai::all();
        $gaji_pokok = $pegawai->gaji_pokok;
        $jabatan = Jabatan::find($pegawai->jabatan);
        $tunjangan_jabatan =$jabatan->tunjangan_jabatan;
        $status = $pegawai->status_nikah;
        $anak = $pegawai->jumlah_anak;

        if ($status == 'Menikah') {
            if ($anak == 0) {
                $tunjangan_nikah = 200000.00;
                $tunjangan_anak = 0.00;
            } else if ($anak == 1) {
                $tunjangan_nikah = 200000.00;
                $tunjangan_anak = 100000.00;
            } else if ($anak == 2) {
                $tunjangan_nikah = 200000.00;
                $tunjangan_anak = 200000.00;
            } else if ($anak > 2) {
                $tunjangan_nikah = 200000.00;
                $tunjangan_anak = 300000.00;
            }else if ($anak < 0){
                $tunjangan_nikah = 0.00;
                $tunjangan_anak = 0.00;
            }
        } else {
            $tunjangan_nikah = 0.00;
            $tunjangan_anak = 0.00;
        }

        $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $absensi = Absensi::where('id_pegawai', $pegawai->id_pegawai)
            ->whereIn('keterangan', ['Izin', 'Sakit', 'Cuti'])
            ->whereBetween('tanggal', [$firstDayOfLastMonth, $lastDayOfLastMonth])
            ->count();

        if ($absensi > 0) {
            $potongan = 100000 * $absensi;

        } else {
            $potongan = 0;

        }
        $pajak = 0.12 * ($gaji_pokok + $tunjangan_jabatan + $tunjangan_nikah + $tunjangan_anak - $potongan);
        $total_gaji = $gaji_pokok + $tunjangan_jabatan + $tunjangan_nikah + $tunjangan_anak - $potongan - $pajak;

        return view('pages.gaji.create', compact('pegawais', 'pegawai', 'gaji_pokok', 'tunjangan_jabatan', 'tunjangan_anak', 'tunjangan_nikah', 'potongan', 'pajak', 'total_gaji'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai'=> 'required|integer',
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

        return redirect()->route('gaji.index')->with('success', 'Gaji created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {
        return view('pages.gaji.show', compact('gaji'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        $pegawais = Pegawai::all();
        return view('pages.gaji.edit', compact('gaji','pegawais'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
       $validated = $request->validate([
            'id_pegawai'=> 'required|integer',
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

        return redirect()->route('gaji.index')->with('success', 'Gaji updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {

        $gaji->delete();
        return redirect()->route('gaji.index')->with('success', 'Gaji deleted successfully!');
    }
}
