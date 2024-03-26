<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Pelanggan';
        $actionId = 'pelanggan';
        $header = ['nomor_pelanggan','nama_pelanggan','alamat','latitude','longitude','lingkup_cabang'];
        $data = Pelanggan::all();
        return view('pages.pelanggan.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cabangs = Cabang::all();
        return view('pages.pelanggan.create', compact('cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_pelanggan' => 'required|string|max:16',
            'nama_pelanggan' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'lingkup_cabang' => 'required|integer',
        ]);
        
        
        Pelanggan::create($validated); 

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('pages.pelanggan.show', compact('pelanggan'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
       
        $cabangs = Cabang::all();
        return view('pages.pelanggan.edit', compact('pelanggan', 'cabangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
            'nomor_pelanggan' => 'required|string|max:16',
            'nama_pelanggan' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'lingkup_cabang' => 'required|integer',
        ]);
        
        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan updated successfully!');
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
    
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan deleted successfully!');
    }
}
