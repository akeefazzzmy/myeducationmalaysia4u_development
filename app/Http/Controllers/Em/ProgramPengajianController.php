<?php

namespace App\Http\Controllers\Em;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProgramPengajian;
use App\Models\TahapPengajian;
use App\Models\Institusi;

class ProgramPengajianController extends Controller
{
    //    
    public function index()
    {
        $senaraiProgramPengajian = ProgramPengajian::orderBy('tahap_pengajian_id')->get();

        return view('em.programpengajian.index', compact('senaraiProgramPengajian'));
    }

    public function create()
    {
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiInstitusi = Institusi::get();

        return view('em.programpengajian.create', compact('senaraiTahapPengajian', 'senaraiInstitusi'));
    }
    public function store(Request $request)
    {
        $programpengajian = new ProgramPengajian();

        $programpengajian->kod_program_pengajian = $request->kod;
        $programpengajian->keterangan = $request->nama;
        $programpengajian->tahap_pengajian_id = $request->tahapPengajian;
        $programpengajian->institusi_id = $request->institusi;
        $programpengajian->save();

        return redirect()->route('em-programpengajian:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'ProgramPengajian sudah berjaya ditambah'
            ]
        );
    }
    public function edit(ProgramPengajian $programpengajian)
    {
        $tahapPengajian = TahapPengajian::get();
        $senaraiInstitusi = Institusi::get();

        return view('em.programpengajian.edit', compact(['programpengajian', 'tahapPengajian', 'senaraiInstitusi']));
    }
    public function update(ProgramPengajian $programpengajian, Request $request)
    {
        $programpengajian->kod_program_pengajian = $request->kod;
        $programpengajian->keterangan = $request->nama;
        $programpengajian->tahap_pengajian_id = $request->tahapPengajian;
        $programpengajian->institusi_id = $request->institusi;
        $programpengajian->save();

        return redirect()->route('em-programpengajian:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Program Pengajian sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(ProgramPengajian $programpengajian)
    {
        // $this->authorize('delete', $training);
        
        $programpengajian->delete();

        return redirect()->route('em-programpengajian:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Program Pengajian sudah berjaya dihapuskan'
        ]);
    }
}
