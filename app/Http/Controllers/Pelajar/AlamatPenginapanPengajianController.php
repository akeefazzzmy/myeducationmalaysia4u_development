<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Negara;
use App\Models\States;
use App\Models\PengajianPelajar;
use App\Models\AlamatPenginapanPengajian;

class AlamatPenginapanPengajianController extends Controller
{
    //
    public function create(PengajianPelajar $pengajian)
    {
        $senaraiNegara = Negara::get();
        $senaraiStates = States::orderBy('keterangan')->get();
        return view('pelajar.alamatpenginapanpengajian.create', compact('pengajian', 'senaraiNegara', 'senaraiStates'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $alamatPenginapanPengajian = new AlamatPenginapanPengajian();
        $alamatPenginapanPengajian->alamat_penuh = $request->alamatPenginapanPengajian;
        $alamatPenginapanPengajian->pengajian_pelajar_id = $request->pengajianID;
        $alamatPenginapanPengajian->kod_negara = $request->negara;
        $alamatPenginapanPengajian->states_id = $request->state;
        $alamatPenginapanPengajian->save();

        return redirect()->route('pelajar-pengajianpelajar:show', $request->pengajianID)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Alamat Penginapan Pengajian sudah berjaya ditambah'
            ]
        );
    }
    public function edit(AlamatPenginapanPengajian $alamat, Request $request)
    {
        $pelajarID = $request->pelajarID;
        $states = States::orderBy('keterangan')->get();
        
        return view('pelajar.alamatpenginapanpengajian.edit', compact('alamat', 'states', 'pelajarID'));
    }
    public function update(AlamatPenginapanPengajian $alamat, Request $request)
    {
        $pelajarID = $request->pelajarID;
        // dd($pelajarID);
        // dd($request);
        $alamat->alamat_penuh = $request->alamat;
        $alamat->states_id = $request->state;
        // $alamat->tarikh_tamat = $request->tarikh_tamat;
        $alamat->save();

        return redirect()->route('pelajar-pengajianpelajar:show', $pelajarID)->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Alamat Penginapan Pengajian sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(AlamatPenginapanPengajian $alamat, Request $request)
    {
        $alamat->delete();

        return redirect()->route('pelajar-pengajianpelajar:show', $request->pelajarID)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Alamat Penginapan Pengajian sudah berjaya dihapuskan'
        ]);

    }
}
