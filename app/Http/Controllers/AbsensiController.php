<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Absensi';
        $actionId = '/absensi/{{$item->id_absensi}}';
        $header = ['ID Pegawai','Nama Lengkap','Jenis Kelamin','Telepon','Kantor Cabang','Jabatan','Gaji','Foto'];
        $data = Absensi::all();
        return view('pages.absensi.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s',  
            'waktu_keluar' => 'nullable|date_format:H:i:s', 
            'status' => 'required|string|max:20',
            'keterangan' => 'nullable|string|in:Masuk,Izin,Sakit,Cuti',  
            'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
        ]);
        
        $absensi = Absensi::create($request->all()); 

        return redirect()->route('pages.absensi.index')
                        ->with('success', 'Absensi created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absensi = Absensi::find($id); // Find Absensi by ID

        if (!$absensi) {
            return abort(404); // Handle non-existent resource
        }

        return view('pages.absensi.show', compact('absensis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absensis = Absensi::find($id);

        if (!$absensis) {
            return abort(404);
        }

        // You might need to fetch additional data for the edit form
        return view('pages.absensi.edit', compact('absensis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s',  
            'waktu_keluar' => 'nullable|date_format:H:i:s', 
            'status' => 'required|string|max:20',
            'keterangan' => 'nullable|string|in:Masuk,Izin,Sakit,Cuti',  
            'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
        ]);

        $absensis = Absensi::find($id);

        if (!$absensis) {
            return abort(404);
        }

        $absensis->update($request->all()); 

        return redirect()->route('pages.absensi.index')
                        ->with('success', 'Absensi updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absensis = Absensi::find($id);

        if (!$absensis) {
            return abort(404);
        }

        $absensis->delete();

        return redirect()->route('pages.absensi.index')
                        ->with('success', 'Absensi deleted successfully!');
    }
}
