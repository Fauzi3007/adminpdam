<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cutis = Cuti::all();
        return view('pages.cuti.index',compact('cutis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('pages.cuti.create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:10',
            'bukti_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $cuti = Cuti::create($validated);

        // Handle file upload
        $photoName = $this->handleFileUpload($request, $cuti);
        if ($photoName) {
            $cuti->bukti_foto = $photoName;
            $cuti->save();
        }


        return redirect()->route('cuti.index')->with('success', 'Cuti created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        return view('pages.cuti.show', compact('cuti'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        $pegawais = Pegawai::all();

        return view('pages.cuti.edit', compact('cuti','pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuti $cuti)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:10',
            'bukti_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $cuti->update($validated);

        // Handle file upload
        $photoName = $this->handleFileUpload($request, $cuti);
        if ($photoName) {
            $cuti->bukti_foto = $photoName;
            $cuti->save();
        }

        return redirect()->route('cuti.index')->with('success', 'Cuti updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        // Delete the photo if it exists
        $this->deleteFile($cuti->bukti_foto);

        $cuti->delete();
        return redirect()->route('cuti.index')->with('success', 'Cuti deleted successfully!');
    }

    /**
     * Handle file upload for Cuti.
     */
    protected function handleFileUpload(Request $request, Cuti $cuti)
    {
        if ($request->hasFile('bukti_foto')) {
            $oldPhoto = $cuti->bukti_foto;

            $image = $request->file('bukti_foto');
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
