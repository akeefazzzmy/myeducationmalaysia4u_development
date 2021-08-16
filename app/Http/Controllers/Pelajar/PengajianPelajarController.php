<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\PengajianPelajar;
use App\Models\ProgramPengajian;
use App\Models\Negara;
use App\Models\States;
use App\Models\Institusi;
use App\Models\Bidang;
use App\Models\TahapPengajian;
use App\Models\AlamatPenginapanPengajian;
use DataTables;

class PengajianPelajarController extends Controller
{
    //
    public function index()
    {
        $profil = Auth::user()->profil_pelajar;
        // dd($profil);
        $pengajianPelajar = PengajianPelajar::where('profil_pelajar_id', $profil->id)->get();
        // dd($pengajianPelajar);

        return view('pelajar.pengajianpelajar.index', compact('pengajianPelajar'));
    }
    public function create()
    {
        $user = Auth::user();
        // $senaraiInstitusi = Institusi::get();
        // $senaraiTahapPengajian = TahapPengajian::get();
        // $senaraiProgramPengajian = ProgramPengajian::get();

        // return view('pelajar.pengajianpelajar.create', compact('user', 'senaraiTahapPengajian', 'senaraiInstitusi', 'senaraiProgramPengajian'));
        // return view('pelajar.pengajianpelajar.create', compact('user', 'senaraiProgramPengajian'));


        // dd($senaraiInstitusi);
        $senaraiNegara = Negara::get();
        $senaraiInstitusi = Institusi::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidangPengajian = Bidang::get();
        $senaraiProgramPengajian = ProgramPengajian::get();

        return view('pelajar.pengajianpelajar.create', compact(
            [
                'user',
                'senaraiNegara',
                'senaraiInstitusi',
                'senaraiBidangPengajian',
                'senaraiTahapPengajian',
                'senaraiProgramPengajian'
            ]));
    }
    public function store(Request $request)
    {
        // dd($request);
        $pengajianPelajar = new PengajianPelajar();
        $pengajianPelajar->profil_pelajar_id = $request->profilPelajarID;
        $pengajianPelajar->kod_negara = $request->negara;
        $pengajianPelajar->kod_states = $request->state;
        $pengajianPelajar->institusi_id = $request->institusiPengajian;        
        $pengajianPelajar->tahap_pengajian_id = $request->tahapPengajian;
        $pengajianPelajar->kod_bidang = $request->bidangPengajian;
        $pengajianPelajar->program_pengajian_id = $request->programPengajian;
        $pengajianPelajar->tarikh_mula = $request->tarikhMulaPengajian;
        $pengajianPelajar->tarikh_tamat = $request->tarikhTamatPengajian;

        $pengajianPelajar->save();

        return redirect()->route('pelajar-pengajianpelajar:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Pengajian sudah berjaya ditambah'
            ]
        );
    }
    public function show(PengajianPelajar $pengajian)
    {
        // dd($pengajian);
        $senaraiAlamatPenginapanPengajian = $pengajian->alamat_penginapan_pengajian;
        // dd($senaraiAlamatPenginapanPengajian);
        $senaraiPenajaPengajian = $pengajian->penaja_pengajian;
        // dd($senaraiPenajaPengajian);

        return view('pelajar.pengajianpelajar.show', compact('pengajian', 'senaraiAlamatPenginapanPengajian', 'senaraiPenajaPengajian'));
    }
    public function edit(PengajianPelajar $pengajian)
    {
        // dd($pengajian);
        $senaraiNegara = Negara::get();
        $senaraiState = States::get();
        $senaraiProgram = ProgramPengajian::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidang = Bidang::get();
        // $senaraiInstitusiPengajian = Institusi::get();

        return view('pelajar.pengajianpelajar.edit', compact(
            [
                'pengajian',
                'senaraiNegara',
                'senaraiState',
                'senaraiProgram',
                'senaraiTahapPengajian',
                'senaraiBidang'
                // 'senaraiInstitusiPengajian'
            ]));
    }
    public function update(PengajianPelajar $pengajian, Request $request)
    {
        // dd($request);
        $pengajian->profil_pelajar_id = $request->profilPelajarID;
        $pengajian->kod_negara = $request->negara;
        $pengajian->kod_states = $request->state;
        $pengajian->institusi_id = $request->institusi;
        $pengajian->tahap_pengajian_id = $request->tahapPengajian;
        $pengajian->kod_bidang = $request->bidangPengajian;
        $pengajian->program_pengajian_id = $request->programPengajian;
        $pengajian->tarikh_mula = $request->tarikh_mula;
        $pengajian->tarikh_tamat = $request->tarikh_tamat;
        $pengajian->save();

        return redirect()->route('pelajar-pengajianpelajar:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Maklumat Pengajian sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(PengajianPelajar $pengajian)
    {        
        $pengajian->alamat_penginapan_pengajian()->delete();
        $pengajian->penaja_pengajian()->delete();
        $pengajian->delete();

        return redirect()->route('pelajar-pengajianpelajar:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Maklumat Pengajian Pelajar sudah berjaya dihapuskan'
        ]);
    }

    public function populateNegaraToStates(Request $request)
    {
        // dd($request);
        $senaraiStates = States::where('kod_negara', $request->kod_negara)->get();
        return $senaraiStates;
    }
    public function populateStatesToInstitusi(Request $request)
    {
        $senaraInstitusi = Institusi::where('kod_states', $request->kod_state)->get();
        return $senaraInstitusi;
    }
    public function populateBidangToProgram(Request $request)
    {
        $senaraiProgram = ProgramPengajian::where('kod_bidang', $request->kod_bidang)->get();
        return $senaraiProgram;
    }

    // TRY DATATABLE YAJRA
    public function getPengajianPelajar(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $profil = Auth::user()->profil_pelajar;
            // dd($profil);
            // $pengajianPelajar = PengajianPelajar::where('profil_pelajar_id', $profil->id)->get();
            // dd($pengajianPelajar);
            $data = PengajianPelajar::where('profil_pelajar_id', $profil->id)->latest()->get();
            $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tahapPengajian', function($row)
                {
                    $columnTahapPengajian = $row->tahap_pengajian->keterangan;
                    return $columnTahapPengajian;
                })
                ->addColumn('bidangPengajian', function($row)
                {
                    $columnBidangPengajian = $row->bidang->nama_bidang;
                    return $columnBidangPengajian;
                })
                ->addColumn('tarikhMulaPengajian', function($row)
                {
                    $tarikhMulaPengajian = $row->tarikh_mula;
                    // dd($tarikhMulaPengajian);
                    $columnTarikhMulaPengajian = \Carbon\Carbon::parse($tarikhMulaPengajian)->format('d/m/Y');

                    return $columnTarikhMulaPengajian;
                })
                ->addColumn('tarikhTamatPengajian', function($row)
                {
                    $tarikhTamatPengajian = $row->tarikh_tamat;
                    $columnTarikhTamatPengajian = \Carbon\Carbon::parse($tarikhTamatPengajian)->format('d/m/Y');

                    return $columnTarikhTamatPengajian;
                })
                ->addColumn('action', function($row) use($hapusMessage)
                {
                    $actionBtn =
                    '<a href="/pelajar/pengajianpelajar/'.$row->id.'" class="btn btn-primary">Papar</a>
                    <a href="/pelajar/pengajianpelajar/delete/'.$row->id.'" onclick="return confirm('."'$hapusMessage'".')" class="btn btn-danger">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
