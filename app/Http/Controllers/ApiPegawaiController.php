<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'status_nikah' => 'required|string',
            'jumlah_anak' => 'required|integer',
            'kantor_cabang' => 'required|integer',
            'jabatan' => 'required|integer',
            'gaji_pokok' => 'required|numeric',
            'foto' => 'nullable|string',
            'id_user' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
      
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
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
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
        'foto' => 'nullable|string',
        'id_user' => 'required|integer',
    ]);

    // If validation fails, return the validation errors
    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Find the Pegawai model by ID
    $pegawai = Pegawai::find($id);

    // If the Pegawai model is not found, return a 404 response
    if (!$pegawai) {
        return response()->json(['error' => 'Pegawai not found'], 404);
    }

    // Update the Pegawai model with the request data
    $pegawai->update($request->all());

    // Return a success message
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
