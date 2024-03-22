<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Pegawai';
        $actionId = 'pegawai';
        $header = ['nama_lengkap', 'jenis_kelamin', 'telepon', 'alamat', 'kantor_cabang', 'jabatan', 'gaji'];
        $data = Pegawai::all();
         
        return view('pages.pegawai.index', compact('title', 'header', 'actionId', 'data'));
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
        $this->validatePegawai($request);

        Pegawai::create($request->all());
        // $this->handleFileUpload($request, $pegawai);


        return redirect('/pegawai')->with('success', 'Pegawai created successfully!');
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
        return view('pages.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validatePegawai($request);

        $pegawais = Pegawai::find($id); 

        if (!$pegawais) {
            return abort(404); 
        }

        // $this->handleFileUpload($request, $pegawai);
        $pegawais->update($request->all());

        return redirect('/pegawai')->with('success', 'Pelanggan updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawais = pegawai::find($id); 

        if (!$pegawais) {
            return abort(404); 
        }

        $pegawais->delete();

        return redirect('/pegawai')->with('success', 'Pegawai deleted successfully!');
    }

    /**
     * Validate the request data for Pegawai.
     */
    protected function validatePegawai(Request $request)
    {
        return $request->validate([
            'id_user' => 'required|integer|exists:users,id_user',
            'nama_lengkap' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|in:L,P',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'status_nikah' => 'required|string',
            'jumlah_anak' => 'required|integer',
            'kantor_cabang' => 'required|integer|exists:cabangs,id_cabang',
            'jabatan' => 'required|integer|exists:jabatans,id_jabatan',
            'foto' => 'nullable|string|max:100',
        ]);
    }

    /**
     * Handle file upload for Pegawai.
     */
    // protected function handleFileUpload(Request $request, Pegawai $pegawai)
    // {
    //     if ($request->hasFile('foto')) {
    //         $image = $request->file('foto');
    //         $name = time() . '.' . $image->getClientOriginalExtension();
    //         $destinationPath = public_path('/images');
    //         $image->move($destinationPath, $name);
    //         $pegawai->foto = $name;
    //     }
    // }
}
