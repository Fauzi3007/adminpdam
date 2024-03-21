<?php

namespace App\Http\Controllers;

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
        $actionId = '/pegawai/{{$item->id_pegawai}}';
        $header = ['ID Pegawai','Nama Lengkap','Jenis Kelamin','Telepon','Kantor Cabang','Jabatan','Gaji','Foto'];
        $data = Pegawai::all();
         
        return view('pages.pegawai.index', compact('title','header','actionId','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string:max:15',
            'alamat' => 'required|string',
            'status_nikah' => 'required|string',
            'jumlah_anak' => 'required|integer',
            'kantor_cabang' => 'required|integer|exists:cabangs,id_cabang',
            'jabatan' => 'required|integer|exists:jabatans,id_jabatan',
            'gaji' => 'required|integer|exists:gajis,id_gaji',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_user' => 'required|integer|exists:users,id_user',
        ]);

        $pegawai = new Pegawai();
        $pegawai->nama_lengkap = $request->nama_lengkap;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->telepon = $request->telepon;
        $pegawai->alamat = $request->alamat;
        $pegawai->status_nikah = $request->status_nikah;
        $pegawai->jumlah_anak = $request->jumlah_anak;
        $pegawai->kantor_cabang = $request->kantor_cabang;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->gaji = $request->gaji;
        $pegawai->id_user = $request->id_user;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $pegawai->foto = $name;
        }

        $pegawai->save();

        return redirect()->route('pages.pegawai.index')
                        ->with('success', 'Pegawai created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return abort(404);
        }

        return view('pages.pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return abort(404);
        }

        return view('pages.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string:max:15',
            'alamat' => 'required|string',
            'status_nikah' => 'required|string',
            'jumlah_anak' => 'required|integer',
            'kantor_cabang' => 'required|integer|exists:cabangs,id_cabang',
            'jabatan' => 'required|integer|exists:jabatans,id_jabatan',
            'gaji' => 'required|integer|exists:gajis,id_gaji',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_user' => 'required|integer|exists:users,id_user',
        ]);

        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return abort(404);
        }

        $pegawai->nama_lengkap = $request->nama_lengkap;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->telepon = $request->telepon;
        $pegawai->alamat = $request->alamat;
        $pegawai->status_nikah = $request->status_nikah;
        $pegawai->jumlah_anak = $request->jumlah_anak;
        $pegawai->kantor_cabang = $request->kantor_cabang;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->gaji = $request->gaji;
        $pegawai->id_user = $request->id_user;
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $pegawai->foto = $name;
        }

        $pegawai->save();

        return redirect()->route('pages.pegawai.index')
                        ->with('success', 'Pegawai updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return abort(404);
        }

        $pegawai->delete();
        return redirect()->route('pages.pegawai.index')
                        ->with('success', 'Pegawai deleted successfully!');
    }
}
