<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required|integer',
            'meteran_lama' => 'required|integer',
            'meteran_baru' => 'required|integer',
            'foto_meteran' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Handle file upload
        $photoName = $this->handleFileUpload($request,new Pencatatan());

        // Create Pegawai with validated data
        $pencatatanData = $request->all();
        if ($photoName) {
            $pencatatanData['foto_meteran'] = $photoName;
        }

        $pencatatan = Pencatatan::create($pencatatanData);

        return response()->json(['message' => 'Pencatatan created successfully!','pencatatan'=> $pencatatan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $pencatatan = Pencatatan::where('id_pegawai', $id)->whereMonth('tanggal', Carbon::now()->month)->get();
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

        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required|integer',
            'meteran_lama' => 'required|integer',
            'meteran_baru' => 'required|integer',
            'foto_meteran' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Handle file upload
        $photoName = $this->handleFileUpload($request,new Pencatatan());

        // Create Pegawai with validated data
        $pencatatanData = $request->all();
        if ($photoName) {
            $pencatatanData['foto_meteran'] = $photoName;
        }

        $pencatatan->update($pencatatanData);

        return response()->json(['message' => 'Pencatatan updated successfully!','pencatatan'=>$pencatatan], 200);
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

        // Delete the photo if exists
        $this->deleteFile($pencatatan->foto_meteran);
        $pencatatan->delete();
        return response()->json(['message' => 'Pencatatan deleted successfully!'], 200);
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
