<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function filterByCabang(Request $request, string $id)
    {
        $request->validate([
            'id_cabang' => 'required|integer',
        ]);

        $pegawai = Pegawai::where('kantor_cabang', $request->id_cabang)->get();
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_user' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Handle file upload
        $photoName = $this->handleFileUpload($request, new Pegawai());

        // Create Pegawai with validated data
        $pegawaiData = $request->all();
        if ($photoName) {
            $pegawaiData['foto'] = $photoName;
        }

        $pegawai = Pegawai::create($pegawaiData);

        return response()->json(['message' => 'Pegawai created successfully!', 'pegawai' => $pegawai], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::where('id_pegawai', $id)->first();
        if (!$pegawai) {
            return response()->json(['error' => 'Pegawai not found'], 404);
        }


        return response()->json($pegawai, 200);
    }

    public function jabatanDanCabang(string $id)
    {
        $pegawai = Pegawai::where('id_pegawai', $id)->first();
        if (!$pegawai) {
            return response()->json(['error' => 'Pegawai not found'], 404);
        }

        $jabatan = $pegawai->jabatan->nama_jabatan;
        $cabang = $pegawai->cabang->nama_cabang;

        return response()->json(['nama_jabatan' => $jabatan, 'nama_cabang' => $cabang], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_user' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $pegawai = Pegawai::where('id_pegawai', $id)->first();

        if (!$pegawai) {
            return response()->json(['error' => 'Pegawai not found'], 404);
        }

        // Handle file upload
        $photoName = $this->handleFileUpload($request, $pegawai);

        // Update Pegawai with validated data
        $pegawaiData = $request->all();
        if ($photoName) {
            $pegawaiData['foto'] = $photoName;
        }

        $pegawai->update($pegawaiData);

        return response()->json(['message' => 'Pegawai updated successfully!', 'pegawai' => $pegawai], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return response()->json(['error' => 'Pegawai not found'], 404);
        }

        // Delete the photo if exists
        $this->deleteFile($pegawai->foto);

        $pegawai->delete();

        return response()->json(['message' => 'Pegawai deleted successfully!'], 200);
    }

    /**
     * Handle file upload for Pegawai.
     */
    protected function handleFileUpload(Request $request, Pegawai $pegawai)
    {
        if ($request->hasFile('foto')) {
            $oldPhoto = $pegawai->foto;

            $image = $request->file('foto');
            $path = $image->store('public/images'); // Store the image in the 'public/images' directory
            $name = basename($path); // Get the filename

            if ($oldPhoto) {
                $this->deleteFile($oldPhoto);
            }

            return $name;
        }
        return null;
    }

    protected function deleteFile($filename)
    {
        $filePath = 'public/images/' . $filename;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            Log::warning('File not found: ' . $filePath);
        }
    }
}
