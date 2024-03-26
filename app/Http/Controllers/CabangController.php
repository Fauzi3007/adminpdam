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
        $actionId = 'cabang';
        $header = ['nama_cabang','latitude_cabang','longitude_cabang'];
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
       $validated = $request->validate([
            'nama_cabang' => 'required|string|max:50',
            'latitude_cabang' => 'required|string|max:20',
            'longitude_cabang' => 'required|string|max:20',
        ]);

        Cabang::create($validated);

        return redirect()->route('cabang.index')->with('success', 'Cabang created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabang $cabang)
    {
        return view('pages.cabang.show', compact('cabang'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabang $cabang)
    {
        return view('pages.cabang.edit', compact('cabang'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabang $cabang)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:100',
            'latitude_cabang' => 'required|string|max:20',
            'longitude_cabang' => 'required|string|max:20',
        ]);

        
        $cabang->update($validated);

        return redirect()->route('cabang.index')->with('success', 'Cabang updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabang $cabang)
    {
       
        $cabang->delete();
        return redirect()->route('cabang.index')->with('success', 'Cabang deleted successfully!');
    }
}
