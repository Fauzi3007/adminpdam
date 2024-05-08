<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;

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
        $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:10',
        ]);

        Cuti::create($request->all());

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
        $request->validate([
            'id_pegawai' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:10',
        ]);


        $cuti->update($request->all());

        return redirect()->route('cuti.index')->with('success', 'Cuti updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {

        $cuti->delete();
        return redirect()->route('cuti.index')->with('success', 'Cuti deleted successfully!');
    }
}
