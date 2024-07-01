<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PencatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pencatatans = Pencatatan::all();
        return view('pages.pencatatan.index', compact('pencatatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        $pelanggans = Pelanggan::all();

        return view('pages.pencatatan.create',compact('pegawais','pelanggans'));
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
            'foto_meteran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);


        $pencatatan = Pencatatan::create($validated);

        $photoName = $this->handleFileUpload($request, $pencatatan);
        if ($photoName) {
            $pencatatan->foto_meteran = $photoName;
            $pencatatan->save();
        }

        return redirect()->route('pencatatan.index')->with('success', 'Pencatatan Stored successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Pencatatan $pencatatan)
    {
        return view('pages.pencatatan.show', compact('pencatatan'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pencatatan $pencatatan)
    {

        $pegawais = Pegawai::all();
        $pelanggans = Pelanggan::all();

        return view('pages.pencatatan.edit', compact('pencatatan','pegawais','pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pencatatan $pencatatan)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|integer',
            'meteran_lama' => 'required|integer',
            'meteran_baru' => 'required|integer',
            'foto_meteran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);


        $pencatatan->update($validated);

        $photoName = $this->handleFileUpload($request, $pencatatan);
        if ($photoName) {
            $pencatatan->foto_meteran = $photoName;
            $pencatatan->save();
        }


        return redirect()->route('pencatatan.index')->with('success', 'Pencatatan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pencatatan $pencatatan)
    {

        $pencatatan->delete();

        return redirect()->route('pencatatan.index')->with('success', 'Pencatatan deleted successfully!');
    }

    protected function handleFileUpload(Request $request, Pencatatan $pencatatan)
    {
        if ($request->hasFile('foto_meteran')) {
            $oldPhoto = $pencatatan->foto_meteran;

            $image = $request->file('foto_meteran');
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
