<?php

namespace App\Http\Controllers;

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
        $actionId = '/pelanggan/{{$item->id_pelanggan}}';
        $header = ['ID Jabatan','Nama Jabatan','Tunjangan'];
        $data = Pelanggan::all();
        return view('pages.pelanggan.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_pelanggan' => 'required|string|max:20',
            'nama_pelanggan' => 'required|string|max:50',
            'alamat' => 'required|string|max:300',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'lingkup_cabang' => 'required|exists:cabangs,id_cabang',
        ]);
        
        
        $pelanggans = Pelanggan::create($request->all()); 

        return redirect()->route('pages.pelanggan.index')
                        ->with('success', 'Pelanggan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::find($id); 

        if (!$pelanggan) {
            return abort(404); 
        }

        return view('pages.pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::find($id); 

        if (!$pelanggan) {
            return abort(404); 
        }

        return view('pages.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor_pelanggan' => 'required|string|max:20',
            'nama_pelanggan' => 'required|string|max:50',
            'alamat' => 'required|string|max:300',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'lingkup_cabang' => 'required|exists:cabangs,id_cabang',
        ]);
        
        $pelanggan = Pelanggan::find($id); 

        if (!$pelanggan) {
            return abort(404); 
        }

        $pelanggan->update($request->all());

        return redirect()->route('pages.pelanggan.index')
                        ->with('success', 'Pelanggan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id); 

        if (!$pelanggan) {
            return abort(404); 
        }

        $pelanggan->delete();

        return redirect()->route('pages.pelanggan.index')
                        ->with('success', 'Pelanggan deleted successfully!');
    }
}
