<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensis = Absensi::all();
        return view('pages.absensi.index', compact('absensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('pages.absensi.create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|string|max:20',
            'keterangan' => 'nullable|string|in:Hadir,Izin,Sakit,Cuti',
            'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
        ]);

        // Combine date and time for timestamp fields
        if ($request->waktu_masuk) {
            $validated['waktu_masuk'] = Carbon::parse($request->tanggal . ' ' . $request->waktu_masuk)->format('Y-m-d H:i:s');
        }

        if ($request->waktu_keluar) {
            $validated['waktu_keluar'] = Carbon::parse($request->tanggal . ' ' . $request->waktu_keluar)->format('Y-m-d H:i:s');
        }

        Absensi::create($validated);

        return redirect()->route('absensi.index')->with('success', 'Absensi created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        return view('pages.absensi.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        $absensi->waktu_masuk = Carbon::parse($absensi->waktu_masuk)->format('H:i');
        if ($absensi->waktu_keluar) {
            $absensi->waktu_keluar = Carbon::parse($absensi->waktu_keluar)->format('H:i');
        }
        return view('pages.absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
{
    $request->validate([
        'tanggal' => 'required|date',
        'waktu_masuk' => 'nullable|date_format:H:i',
        'waktu_keluar' => 'nullable|date_format:H:i',
        'status' => 'required|string|max:20',
        'keterangan' => 'nullable|string|in:Hadir,Izin,Sakit,Cuti',
        'id_pegawai' => 'required|integer|exists:pegawais,id_pegawai',
    ]);

    $data = $request->all();

    // Combine date and time for timestamp fields
    if ($request->waktu_masuk) {
        $data['waktu_masuk'] = Carbon::parse($request->tanggal . ' ' . $request->waktu_masuk)->format('Y-m-d H:i:s');
    }

    if ($request->waktu_keluar) {
        $data['waktu_keluar'] = Carbon::parse($request->tanggal . ' ' . $request->waktu_keluar)->format('Y-m-d H:i:s');
    }

    $absensi->update($data);

    return redirect()->route('absensi.index')->with('success', 'Absensi updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi deleted successfully!');
    }
}
