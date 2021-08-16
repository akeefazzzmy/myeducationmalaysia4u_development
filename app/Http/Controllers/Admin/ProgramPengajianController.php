<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProgramPengajian;
use App\Models\TahapPengajian;
use App\Models\Institusi;
use App\Models\Bidang;

class ProgramPengajianController extends Controller
{
    //

    public function index(ProgramPengajian $programpengajian)
    {
        $programpengajian = ProgramPengajian::orderBy('tahap_pengajian_id')->get();
        return view('admin.programpengajian.index', compact('programpengajian'));
    }
    public function create()
    {
        $tahapPengajian = TahapPengajian::get();
        $senaraiInstitusi = Institusi::get();
        $senaraiBidang = Bidang::orderBy('nama_bidang', 'ASC')->get();
        return view('admin.programpengajian.create', compact(['tahapPengajian', 'senaraiInstitusi', 'senaraiBidang']));
    }
    public function store(Request $request)
    {
        $programpengajian = new ProgramPengajian();

        $programpengajian->kod_program_pengajian = $request->kod;
        $programpengajian->keterangan = $request->nama;
        $programpengajian->tahap_pengajian_id = $request->tahapPengajian;
        $programpengajian->bidang_id = $request->bidang;
        $programpengajian->institusi_id = $request->institusi;
        $programpengajian->save();

        return redirect()->route('admin-programpengajian:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'ProgramPengajian sudah berjaya ditambah'
            ]
        );
    }
    public function show(ProgramPengajian $programpengajian)
    {
        return view('admin.programpengajian.show', compact('programpengajian'));
    }
    public function edit(ProgramPengajian $programpengajian)
    {
        $tahapPengajian = TahapPengajian::get();
        $senaraiInstitusi = Institusi::get();

        return view('admin.programpengajian.edit', compact(['programpengajian', 'tahapPengajian', 'senaraiInstitusi']));
    }
    public function update(ProgramPengajian $programpengajian, Request $request)
    {
        $programpengajian->kod_program_pengajian = $request->kod;
        $programpengajian->keterangan = $request->nama;
        $programpengajian->tahap_pengajian_id = $request->tahapPengajian;
        $programpengajian->institusi_id = $request->institusi;
        $programpengajian->save();

        return redirect()->route('admin-programpengajian:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Program Pengajian sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(ProgramPengajian $programpengajian)
    {
        // $this->authorize('delete', $training);
        
        $programpengajian->delete();

        return redirect()->route('admin-programpengajian:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Program Pengajian sudah berjaya dihapuskan'
        ]);
    }
}
