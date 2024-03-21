<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Gaji';
        $actionId = '/gaji/{{$item->id_gaji}}';
        $header = ['ID Jabatan','Nama Jabatan','Tunjangan'];
        $data = Gaji::all();
        return view('pages.gaji.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.gaji.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'gaji_pokok' => 'required|decimal',
            'tunjangan_jabatan' => 'required|decimal',
            'tunjangan_anak' => 'required|decimal',
            'tunjangan_nikah' => 'required|decimal',
            'potongan' => 'required|decimal',
            'pajak' => 'required|decimal',
            'total_gaji' => 'required|decimal',
        ]);

        $gajis = Gaji::create($request->all());

        return redirect()->route('pages.gaji.index')
                        ->with('success', 'Gaji created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gajis = Gaji::find($id);

        if (!$gajis) {
            return abort(404);
        }

        return view('pages.gaji.show', compact('gajis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gajis = Gaji::find($id);

        if (!$gajis) {
            return abort(404);
        }

        return view('pages.gaji.edit', compact('gajis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'gaji_pokok' => 'required|decimal',
            'tunjangan_jabatan' => 'required|decimal',
            'tunjangan_anak' => 'required|decimal',
            'tunjangan_nikah' => 'required|decimal',
            'potongan' => 'required|decimal',
            'pajak' => 'required|decimal',
            'total_gaji' => 'required|decimal',
        ]);

        $gajis = Gaji::find($id);
        if (!$gajis) {
            return abort(404);
        }
        $gajis->update($request->all());

        return redirect()->route('pages.gaji.index')
                        ->with('success', 'Gaji updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gajis = Gaji::find($id);

        if (!$gajis) {
            return abort(404);
        }

        $gajis->delete();
        return redirect()->route('pages.gaji.index')
                        ->with('success', 'Gaji deleted successfully!');
    }
}
