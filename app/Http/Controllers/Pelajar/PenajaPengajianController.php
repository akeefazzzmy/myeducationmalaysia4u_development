<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PengajianPelajar;
use App\Models\PenajaPengajian;
use App\Models\Penaja;

class PenajaPengajianController extends Controller
{
    //
    // public function create(PenajaPengajian $pengajian)
    public function create(PengajianPelajar $pengajian)
    {
        $senaraiPenaja = Penaja::orderBy('singkatan')->get(); 
        return view('pelajar.penajapengajian.create', compact('senaraiPenaja', 'pengajian'));
    }
    public function store(Request $request)
    {
        $penajaPengajian = new PenajaPengajian();
        $penajaPengajian->pengajian_pelajar_id = $request->pengajianID;
        $penajaPengajian->penaja_id = $request->penaja;
        $penajaPengajian->save();

        return redirect()->route('pelajar-pengajianpelajar:show', $request->pengajianID)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Penaja Pengajian Pelajar sudah berjaya ditambah'
            ]
        );
    }

    public function destroy(PenajaPengajian $penajaPengajian, Request $request)
    {
        $penajaPengajian->delete();

        return redirect()->route('pelajar-pengajianpelajar:show', $request->pelajarID)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Penaja Pengajian sudah berjaya dihapuskan'
        ]);

    }
}
