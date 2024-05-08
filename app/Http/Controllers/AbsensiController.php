<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $absensis = Absensi::all();
        return view('pages.absensi.index', compact('absensis')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('pages.absensi.create',compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required',  
            'waktu_keluar' => 'nullable', 
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
            'waktu_masuk' => 'required',  
            'waktu_keluar' => 'nullable', 
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
