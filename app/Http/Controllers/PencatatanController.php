<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Pencatatan;
use Illuminate\Http\Request;

class PencatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Pencatatan';
        $actionId = 'pencatatan';
        $header = ['id_pelanggan','meteran_lama','meteran_baru','tanggal','foto_meteran','id_pegawai'];
        $data = Pencatatan::all();
        return view('pages.pencatatan.index', compact('title','header','actionId','data')); 
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
            'foto_meteran' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);


        Pencatatan::create($validated);

        return redirect()->route('pencatatan.index')->with('success', 'Pencatatan updated successfully!');
        
        
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
            'foto_meteran' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'id_pegawai' => 'required|integer',
        ]);

    
        $pencatatan->update($validated);

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
}
