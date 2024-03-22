<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jabatan';
        $actionId = 'jabatan';
        $header = ['nama_jabatan','tunjangan_jabatan'];
        $data = Jabatan::all();
        return view('pages.jabatan.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:30',
            'tunjangan_jabatan' => 'required|numeric',
        ]);

        Jabatan::create($request->all());

        return redirect('/jabatan')->with('success', 'Jabatan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jabatans = Jabatan::find($id);

        if (!$jabatans) {
            return abort(404);
        }

        return view('pages.jabatan.show', compact('jabatans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jabatans = Jabatan::find($id);

        if (!$jabatans) {
            return abort(404);
        }

        // You might need to fetch additional data for the edit form
        return view('pages.jabatan.edit', compact('jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:30',
            'tunjangan_jabatan' => 'required|decimal',
        ]);

        $jabatans = Jabatan::find($id);

        if (!$jabatans) {
            return abort(404);
        }

        $jabatans->update($request->all()); 

        return redirect('/jabatan')->with('success', 'Jabatan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jabatans = Jabatan::find($id);

        if (!$jabatans) {
            return abort(404);
        }

        $jabatans->delete();

        return redirect('/jabatan')->with('success', 'Jabatan deleted successfully!');
    }
}
