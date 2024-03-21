<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
use Illuminate\Http\Request;

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
        return view('pages.pencatatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'meteran_lama' => 'required|integer',
            'meteran_baru' => 'required|integer',
            'tanggal' => 'required|date',
            'foto_meteran_meteran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_pegawai' => 'required|exists:pegawais,id_pegawai',
        ]);

        $pencatatan = new Pencatatan();
        $pencatatan->id_pelanggan = $request->id_pelanggan;
        $pencatatan->meteran_lama = $request->meteran_lama;
        $pencatatan->meteran_baru = $request->meteran_baru;
        $pencatatan->tanggal = $request->tanggal;
        $pencatatan->id_pegawai = $request->id_pegawai;

        if ($request->hasFile('foto_meteran')) {
            $image = $request->file('foto_meteran');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $pencatatan->foto_meteran = $name;
        }

        $pencatatan->save();

        return redirect()->route('pages.pencatatan.index')
                        ->with('success', 'Pencatatan updated successfully!');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pencatatan = Pencatatan::find($id);

        if (!$pencatatan) {
            return abort(404);
        }

        return view('pages.pencatatan.show', compact('pencatatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pencatatan = Pencatatan::find($id);

        if (!$pencatatan) {
            return abort(404);
        }

        return view('pages.pencatatan.edit', compact('pencatatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'meteran_lama' => 'required|integer',
            'meteran_baru' => 'required|integer',
            'tanggal' => 'required|date',
            'foto_meteran_meteran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_pegawai' => 'required|exists:pegawais,id_pegawai',
        ]);

        $pencatatan = Pencatatan::find($id);

        if (!$pencatatan) {
            return abort(404);
        }

        if ($request->hasFile('foto_meteran')) {
            $image = $request->file('foto_meteran');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $pencatatan->foto_meteran = $name;
        }

        $pencatatan->update($request->all());

        return redirect()->route('pages.pencatatan.index')
                        ->with('success', 'Pencatatan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pencatatan = Pencatatan::find($id);

        if (!$pencatatan) {
            return abort(404);
        }

        $pencatatan->delete();

        return redirect()->route('pages.pencatatan.index')
                        ->with('success', 'Pencatatan deleted successfully!');
    }
}
