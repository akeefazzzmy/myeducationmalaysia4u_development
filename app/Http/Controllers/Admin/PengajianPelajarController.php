<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PengajianPelajar;

class PengajianPelajarController extends Controller
{
    //

    public function index(PengajianPelajar $pengajianPelajar)
    {
        $pengajianPelajar = PengajianPelajar::get();
        
        return view('admin.pengajianpelajar.index', compact('pengajianPelajar'));
    }
    public function create()
    {
        return view('admin.pengajianpelajar.create');
    }
    public function store()
    {
        
    }
    public function show()
    {
        
    }
    public function edit()
    {
        
    }
    public function update()
    {
        
    }
    public function destroy()
    {
        
    }
}
