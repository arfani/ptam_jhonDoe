<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Pendidikan::latest()->paginate(5);
        $indexNumber = (request()->input('page', 1) - 1) * 5;
        return view('pendidikan.index', compact('users', 'indexNumber'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendidikan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(StorePendidikanRequest $request)
    {
        $validated = $request->validated();

        $newData = new Pendidikan();

        $newData->name = $validated['name'];

        $newData->save();

        return redirect()->route('pendidikan.index')
        ->with('success', 'Data Pendidikan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidikan $pendidikan)
    {
        return view('pendidikan.show', compact('pendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidikan $pendidikan)
    {
        return view('pendidikan.form-edit',compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Pendidikan $pendidikan)
    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        $validated = $request->validated();

        $pendidikan->name = $validated['name'];

        $pendidikan->save();

        return redirect()->route('pendidikan.index')
        ->with('success', 'Data Pendidikan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')
        ->with('success', 'Data berhasil dihapus');
    }
}
