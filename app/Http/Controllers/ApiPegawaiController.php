<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class ApiPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return response()->json($pegawai);
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'nama_lengkap' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'status_nikah' => 'required|string',
            'jumlah_anak' => 'required|integer',
            'gaji_pokok' => 'required|numeric',
            'kantor_cabang' => 'required|integer',
            'jabatan' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        $pegawai = Pegawai::create($request->all());
        return response()->json(['message' => 'Pegawai created successfully!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::find($id);
        return response()->json($pegawai);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'nama_lengkap' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'status_nikah' => 'required|string',
            'jumlah_anak' => 'required|integer',
            'gaji_pokok' => 'required|numeric',
            'kantor_cabang' => 'required|integer',
            'jabatan' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());
        return response()->json(['message' => 'Pegawai updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return response()->json(['message' => 'Pegawai deleted successfully!'], 200);
    }
}
