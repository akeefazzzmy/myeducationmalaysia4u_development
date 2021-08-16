<?php

namespace App\Http\Controllers\Em;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PenajaPengajian;

class PenajaPengajianController extends Controller
{
    //
    public function index()
    {
        $senaraiPenajaPengajian = PenajaPengajian::get();
        return view('em.penajapengajian.index', compact('senaraiPenajaPengajian'));
    }
}
