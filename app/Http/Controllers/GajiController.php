<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Gaji';
        $actionId = 'gaji';
        $header = ['tanggal','gaji_pokok','tunjangan_jabatan','tunjangan_anak','tunjangan_nikah','potongan','pajak','total_gaji'];
        $data = Gaji::all();
        return view('pages.gaji.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $pegawais = Pegawai::all();
        return view('pages.gaji.create',compact('pegawais'));
    }

    public function createPegawai(Pegawai $pegawai)
    {
        $pegawais = Pegawai::all();
        $gaji_pokok = $pegawai->gaji_pokok;
        $jabatan = Jabatan::find($pegawai->jabatan);
        $tunjangan_jabatan = $jabatan->tunjangan_jabatan;
        $status = Pegawai::find($pegawai->status_nikah);
        $anak = Pegawai::find($pegawai->jumlah_anak);


        if ($status == 'Menikah' && $anak == 0) {
            $tunjangan_nikah = 200000;
            $tunjangan_anak = 0;
        } else if ($status == 'Menikah' && $anak == 1) {
            $tunjangan_nikah = 200000;
            $tunjangan_anak = 100000;
        }else if ($status == 'Menikah' && $anak == 2) {
            $tunjangan_nikah = 200000;
            $tunjangan_anak = 200000;
        }else if ($status == 'Menikah' && $anak > 2) {
            $tunjangan_nikah = 200000;
            $tunjangan_anak = 300000;
        }else if ($status == 'Belum Menikah' || $status == 'Janda' || $status == 'Duda') {
            $tunjangan_nikah = 0;
            $tunjangan_anak = 0;
        }

        $absensi = Absensi::where('id_pegawai', $pegawai->id)->whereIn('keterangan', ['Izin', 'Sakit', 'Cuti'])->count()->get();

        if ($absensi > 0) {
            $potongan = 100000*($absensi->whereIn('keterangan', ['Izin', 'Sakit', 'Cuti'])->count());
            $pajak = 0.12 * ($gaji_pokok + $tunjangan_jabatan + $tunjangan_nikah + $tunjangan_anak - $potongan);
        } else {
            $potongan = 0;
            $pajak = 0;
        }
        $total_gaji = $gaji_pokok + $tunjangan_jabatan + $tunjangan_nikah + $tunjangan_anak - $potongan - $pajak;

        return view('pages.pegawai.create',compact('pegawais','pegawai','gaji_pokok','tunjangan_jabatan','tunjangan_anak','tunjangan_nikah','potongan','pajak','total_gaji'));
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
