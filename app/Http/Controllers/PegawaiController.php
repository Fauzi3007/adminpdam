<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pegawais = Pegawai::all();

        return view('pages.pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cabangs = Cabang::all();
        $jabatans = Jabatan::all();
        $gajis = Gaji::all();
        return view('pages.pegawai.create', compact('cabangs', 'jabatans', 'gajis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pegawai = Pegawai::create($validated);

        // Handle file upload
        $photoName = $this->handleFileUpload($request, $pegawai);
        if ($photoName) {
            $pegawai->foto = $photoName;
            $pegawai->save();
        }

        return redirect()->route('pegawai.index')->with('success', 'Pegawai created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('pages.pegawai.show', compact('pegawai'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $cabangs = Cabang::all();
        $jabatans = Jabatan::all();
        $gajis = Gaji::all();
        return view('pages.pegawai.edit', compact('pegawai', 'cabangs', 'jabatans', 'gajis'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pegawai->update($validated);

        // Handle file upload
        $photoName = $this->handleFileUpload($request, $pegawai);
        if ($photoName) {
            $pegawai->foto = $photoName;
            $pegawai->save();
        }

        return redirect()->route('pegawai.index')->with('success', 'Pegawai updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai deleted successfully!');
    }

    /**
     * Validate the request data for Pegawai.
     */

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
