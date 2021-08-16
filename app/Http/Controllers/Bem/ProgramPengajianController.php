<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProgramPengajian;
use App\Models\TahapPengajian;
use App\Models\Institusi;

class ProgramPengajianController extends Controller
{
    //
    public function index(ProgramPengajian $programpengajian)
    {
        $programpengajian = ProgramPengajian::orderBy('tahap_pengajian_id')->get();
        return view('bem.programpengajian.index', compact('programpengajian'));
    }
}
