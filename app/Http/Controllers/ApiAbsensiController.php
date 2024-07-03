<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::all();
        return response()->json($absensi);
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
    public function show(string $id)
    {
        $absensi = Absensi::where('id_pegawai', $id)
            // ->whereMonth('tanggal', Carbon::now()->month)
            ->get();
        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }
        return response()->json($absensi);
    }

    /**
     * Filter the resource by month.
     */
    public function filterByMonth(Request $request, String $id)
    {
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:1900|max:9999',
        ]);

        $month = $request->input('month');
        $year = $request->input('year');

        $absensi = Absensi::where('id_pegawai', $id)->whereMonth('tanggal', $month)
            ->whereYear('tanggal', $year)
            ->get();

        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }



        return response()->json([
            'absensi' => $absensi,
        ]);
    }

    /**
     * Calculate the attendance statistics.
     */
    public function hitungAbsensi(Request $request, String $id)
    {
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:1900|max:9999',
        ]);

        $month = $request->input('month');
        $year = $request->input('year');

        $absensi = Absensi::where('id_pegawai', $id)
        ->whereMonth('tanggal', $month)
            ->whereYear('tanggal', $year)
            ->get();

        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }
        $jumlah_hadir = $absensi->where('keterangan', 'Hadir')->count();
        $jumlah_izin = $absensi->where('keterangan', 'Izin')->count();
        $jumlah_sakit = $absensi->where('keterangan', 'Sakit')->count();
        $jumlah_cuti = $absensi->where('keterangan', 'Cuti')->count();
        $jumlah_tidak_ada_waktu_keluar = $absensi->whereNull('waktu_keluar')->count();
        $jumlah_terlambat = $absensi->where('waktu_masuk', '>', '07:30')->count();
        $jumlah_tidak_absen = $absensi->whereNull('waktu_masuk')->count();

        return response()->json([
            'jumlah_hadir' => $jumlah_hadir,
            'jumlah_izin' => $jumlah_izin,
            'jumlah_sakit' => $jumlah_sakit,
            'jumlah_cuti' => $jumlah_cuti,
            'jumlah_tidak_ada_waktu_keluar' => $jumlah_tidak_ada_waktu_keluar,
            'jumlah_terlambat' => $jumlah_terlambat,
            'jumlah_tidak_absen' => $jumlah_tidak_absen,
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absensi = Absensi::find($id);
        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }

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

        return response()->json(['message' => 'Absensi updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $absensi = Absensi::find($id);
        if (!$absensi) {
            return response()->json(['message' => 'Absensi not found'], 404);
        }
        $absensi->delete();
        return response()->json(['message' => 'Asbsensi deleted successfully!'], 200);
    }
}
