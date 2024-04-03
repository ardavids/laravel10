<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all(); 
        return view('tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('Ini Fungsi Create');
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required|string',
        ]);

        // dd($validator);
        Siswa::create($validator);
        return redirect('siswa')->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd('ini fungsi edit');
        $data = Siswa::find($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required|string',
        ]);

        Siswa::find($id)->update($validator);
        return redirect('siswa')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        Siswa::find($id)->delete($id);
        return redirect('siswa')->with('success', 'Data berhasil dihapus!');

    }
}