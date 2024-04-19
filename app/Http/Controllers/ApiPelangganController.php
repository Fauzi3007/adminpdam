<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class ApiPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pelanggan = Pelanggan::all();
        return response()->json($Pelanggan);
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

        return response()->json(['message' => 'Pelanggan created successfully!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Pelanggan = Pelanggan::find($id);
        if (!$Pelanggan) {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }
        return response()->json($Pelanggan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $Pelanggan = Pelanggan::find($id);
        if (!$Pelanggan) {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }

        $validated = $request->validate([
            'nomor_pelanggan' => 'required|string|max:16',
            'nama_pelanggan' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'lingkup_cabang' => 'required|integer',
        ]);

        $Pelanggan->update($validated);

        return response()->json(['message' => 'Pelanggan updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Pelanggan = Pelanggan::find($id);
        if (!$Pelanggan) {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }
        $Pelanggan->delete();
        return response()->json(['message' => 'Pelanggan deleted successfully!'], 200);

    }
}
