<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Cabang';
        $actionId = '/cabang/{{$item->id_absensi}}';
        $header = ['ID Pegawai','Nama Lengkap','Jenis Kelamin','Telepon','Kantor Cabang','Jabatan','Gaji','Foto'];
        $data = Cabang::all();
        return view('pages.cabang.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:100',
            'latitude_cabang' => 'required|double',
            'longitude_cabang' => 'required|double',
        ]);

        $cabangs = Cabang::create($request->all());

        return redirect()->route('pages.cabang.index')
                        ->with('success', 'Cabang created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cabangs = Cabang::find($id);
        return view('pages.cabang.show', compact('cabangs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cabangs = Cabang::find($id);
        if (!$cabangs) {
            return abort(404);
        }
        return view('pages.cabang.edit', compact('cabangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:100',
            'latitude_cabang' => 'required|double',
            'longitude_cabang' => 'required|double',
        ]);

        $cabangs = Cabang::find($id);
        if (!$cabangs) {
            return abort(404);
        }
        $cabangs->update($request->all());

        return redirect()->route('pages.cabang.index')
                        ->with('success', 'Cabang updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabangs = Cabang::find($id);
        if (!$cabangs) {
            return abort(404);
        }
        $cabangs->delete();
        return redirect()->route('pages.cabang.index')
                        ->with('success', 'Cabang deleted successfully!');
    }
}
