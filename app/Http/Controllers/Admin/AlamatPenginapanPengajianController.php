<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlamatPenginapanPengajian;

class AlamatPenginapanPengajianController extends Controller
{
    //
    
    public function index()
    {
        // dd("masuk INDEX alamat penginapan pengajian pelajar");
        $alamatPenginapanPengajian = AlamatPenginapanPengajian::get();
        // dd($alamatPenginapanPengajian);
        return view('admin.alamatpenginapanpengajian.index', compact('alamatPenginapanPengajian'));
    }

    public function create()
    {
        dd("masuk CREATE alamat penginapan pengajian pelajar");
    }

    public function store()
    {
        dd("masuk STORE alamat penginapan pengajian pelajar");
    }
}
