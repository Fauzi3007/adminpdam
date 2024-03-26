<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Absensi';
        $actionId = 'absensi';
        $header = ['id_pegawai','nama_lengkap','jenis_kelamin','telepon','kantor_cabang','jabatan','gaji','foto'];
        $data = Absensi::all();
        return view('pages.absensi.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',  
            'waktu_keluar' => 'nullable|date_format:H:i', 
            'status' => 'required|string|max:20',
            'keterangan' => 'nullable|string|in:Masuk,Izin,Sakit,Cuti',  
            'id_pegawai' => 'required|integer',
        ]);
        
       Absensi::create($request->all()); 

        return redirect()->route('absensi.index')->with('success', 'Absensi created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
       
        return view('pages.absensi.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
       
        return view('pages.absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {

        $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s',  
            'waktu_keluar' => 'nullable|date_format:H:i:s', 
            'status' => 'required|string|max:20',
            'keterangan' => 'nullable|string|in:Masuk,Izin,Sakit,Cuti',  
            'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
        ]);

        $absensi->update($request->all()); 

        return redirect()->route('absensi.index')->with('success', 'Absensi updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi deleted successfully!');
    }
    
}
