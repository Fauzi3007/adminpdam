<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
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
