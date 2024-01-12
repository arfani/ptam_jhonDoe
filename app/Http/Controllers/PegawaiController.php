<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::latest()->paginate(5);
        $indexNumber = (request()->input('page', 1) - 1) * 5;
        return view('pegawai.index', compact('pegawai', 'indexNumber'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        $validated = $request->validated();

        $newData = new Pegawai();

        $newData->nama = $validated['nama'];
        $newData->alamat = $validated['alamat'];
        $newData->tgl_lahir = $validated['tgl_lahir'];
        $newData->is_active = $validated['is_active'];
        $newData->pajak = $validated['pajak'];

        $newData->save();

        return redirect()->route('pegawai.index')
        ->with('success', 'Data Pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.form-edit',compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $validated = $request->validated();

        $pegawai->nama = $validated['nama'];

        $pegawai->alamat = $validated['alamat'];
        $pegawai->tgl_lahir = $validated['tgl_lahir'];
        $pegawai->is_active = $validated['is_active'];
        $pegawai->pajak = $validated['pajak'];
        $pegawai->save();

        return redirect()->route('pegawai.index')
        ->with('success', 'Data Pegawai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index')
        ->with('success', 'Data berhasil dihapus');
    }
}
