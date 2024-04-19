<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class ApiCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuti = Cuti::all();
        return response()->json($cuti);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:10', 
        ]);

        Cuti::create($request->all());

        return response()->json(['message' => 'Cuti created successfully!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cuti = Cuti::find($id);
        if (!$cuti) {
            return response()->json(['message' => 'Cuti not found'], 404);
        }
        return response()->json($cuti);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cuti = Cuti::find($id);
        if (!$cuti) {
            return response()->json(['message' => 'Cuti not found'], 404);
        }
        
        $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:10', 
        ]);

        
        $cuti->update($request->all());

        return response()->json(['message' => 'Absensi updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuti = Cuti::find($id);
        if (!$cuti) {
            return response()->json(['message' => 'Cuti not found'], 404);
        }
        $cuti->delete();
        return response()->json(['message' => 'Absensi deleted successfully!'], 200);

    }
}
