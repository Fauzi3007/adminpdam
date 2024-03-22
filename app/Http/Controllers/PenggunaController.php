<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'Pengguna';
        $actionId = 'user';
        $header = ['email','hak_akses'];
        $data = User::all();
        return view('pages.pengguna.index', compact('title','header','actionId','data')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated =  $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'hak_akses' => 'required|string',
        ]);
        
        $validated['password'] = Hash::make($validated['password']);

        $penggunas = User::create($validated);

        return redirect('/user')->with('success', 'Pengguna created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penggunas = User::find($id);
        return view('pages.pengguna.show', compact('penggunas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penggunas = User::find($id);
        if (!$penggunas) {
            return abort(404);
        }
        return view('pages.pengguna.edit', compact('penggunas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'hak_akses' => 'required|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $penggunas = User::find($id);
        $penggunas->update($request->all());

        return redirect('/user')->with('success', 'Pengguna updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penggunas = User::find($id);
        $penggunas->delete();

        return redirect('/user')->with('success', 'Pengguna deleted successfully!');
    }
}
