<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
use Illuminate\Http\Request;

class ApiPencatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pencatatan = Pencatatan::all();
        return response()->json($pencatatan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|integer',
            'meteran_lama' => 'required|integer',
            'meteran_baru' => 'required|integer',
            'foto_meteran' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);

        Pencatatan::create($validated);

        return response()->json(['message' => 'Pencatatan created successfully!'], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pencatatan = Pencatatan::find($id);
        if (!$pencatatan) {
            return response()->json(['message' => 'Pencatatan not found'], 404);
        }
        return response()->json($pencatatan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $pencatatan = Pencatatan::find($id);
        if (!$pencatatan) {
            return response()->json(['message' => 'Pencatatan not found'], 404);
        }

        $validated = $request->validate([
            'id_pelanggan' => 'required|integer',
            'meteran_lama' => 'required|integer',
            'meteran_baru' => 'required|integer',
            'foto_meteran' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);


        $pencatatan->update($validated);

        return response()->json(['message' => 'Pencatatan updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

            $pencatatan = Pencatatan::find($id);
            if (!$pencatatan) {
                return response()->json(['message' => 'Pencatatan not found'], 404);
            }
            $pencatatan->delete();
            return response()->json(['message' => 'Pencatatan deleted successfully!'], 200);

    }
}
