<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PenajaPengajian;

class PenajaPengajianPelajarController extends Controller
{
    //

    public function index(PenajaPengajian $penajaPengajian)
    {
        $senaraiPenajaPengajian = PenajaPengajian::get();
        return view('admin.penajapengajian.index', compact('senaraiPenajaPengajian'));
    }
    public function create()
    {
        
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
