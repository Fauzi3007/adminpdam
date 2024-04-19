<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
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
        $gaji = Gaji::find($id);
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
}
