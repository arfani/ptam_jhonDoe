<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        $laporan = Pegawai::with('pendidikan')->latest()->paginate(5);
        
        $indexNumber = (request()->input('page', 1) - 1) * 5;
        return view('laporan.index', compact('laporan', 'indexNumber'));
    }
}
