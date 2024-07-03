<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $users = User::all();
        return view('pages.pengguna.index', compact('users'));
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
        Pegawai::create([
            'id_user' => $penggunas->id,
            'nama_lengkap' => '',
            'jenis_kelamin' => '',
            'tgl_lahir' => Carbon::now(),
            'telepon' => '',
            'alamat' => '',
            'status_nikah' => '',
            'jumlah_anak' => 0,
            'gaji_pokok' => 0,
            'kantor_cabang' => 0,
            'jabatan' => 0,
            'foto' => '',
        ]);

        $pegawai = Pegawai::where('id_user', $penggunas->id)->first();

        return redirect()->route('pegawai.edit',['pegawai'=>$pegawai->id_pegawai] )->with('success', 'Pengguna created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('pages.pengguna.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.pengguna.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'hak_akses' => 'required|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);


        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'Pengguna updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Pegawai::where('id_user', $user->id)->delete();
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Pengguna deleted successfully!');
    }
}
