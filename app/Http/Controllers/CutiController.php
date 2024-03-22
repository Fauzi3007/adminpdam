<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Cuti';
        $actionId = 'cuti';
        $header = ['id_pegawai','tanggal_mulai','tanggal_selesai','keterangan','status'];
        $data = Cuti::all();
        return view('pages.cuti.index',compact('title','header','actionId','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:20', 
        ]);

        $cutis = Cuti::create($request->all());

        return redirect('/cuti')->with('success', 'Cuti created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cutis = Cuti::find($id);

        if (!$cutis) {
            return abort(404);
        }

        return view('pages.cuti.show', compact('cutis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cutis = Cuti::find($id);

        if (!$cutis) {
            return abort(404);
        }

        return view('pages.cuti.edit', compact('cutis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:20', 
        ]);

        $cutis = Cuti::find($id);

        if (!$cutis) {
            return abort(404);
        }

        $cutis->update($request->all());

        return redirect('/cuti')->with('success', 'Cuti updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cutis = Cuti::find($id);

        if (!$cutis) {
            return abort(404);
        }

        $cutis->delete();
        return redirect('/cuti')->with('success', 'Cuti deleted successfully!');
    }
}
