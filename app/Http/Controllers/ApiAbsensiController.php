<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class ApiAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::all();
        return response()->json($absensi);
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
            'keterangan' => 'nullable|string',  
            'id_pegawai' => 'required|integer',
        ]);
        
       Absensi::create($request->all()); 

       return response()->json(['message' => 'Absensi created successfully!'], 200);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absensi = Absensi::where('id_pegawai',$id)->first();
        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }
        return response()->json($absensi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absensi = Absensi::find($id);
        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }

        $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required',  
            'waktu_keluar' => 'nullable', 
            'status' => 'required|string|max:20',
            'keterangan' => 'nullable|string',  
            'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
        ]);

        $absensi->update($request->all()); 

        return response()->json(['message' => 'Absensi updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $absensi = Absensi::find($id);
        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }   
        $absensi->delete();
        return response()->json(['message' => 'Asbsensi deleted successfully!'], 200);

    }
}
