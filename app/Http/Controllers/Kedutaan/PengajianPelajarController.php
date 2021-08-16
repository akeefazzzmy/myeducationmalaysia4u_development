<?php

namespace App\Http\Controllers\Kedutaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\PengajianPelajar;
use App\Models\Negara;
use App\Models\TahapPengajian;
use App\Models\Bidang;
use App\Models\States;
use App\Models\Institusi;
use App\Models\ProgramPengajian;
use App\Models\User;
use DB;

class PengajianPelajarController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = auth()->user();
        $negara = $user->negara;
        $kod_negara = $negara->kod_negara;

        if($request->search != null)
        {
            $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $kod_negara)
            ->whereHas('negara', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('institusi', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('tahap_pengajian', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('bidang', function($q) use($request)
            {
                $q->where('nama_bidang', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('program_pengajian', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('profil_pelajar', function($q) use($request)
            {
                $q->whereHas('users', function($q2) use($request)
                {
                    $q2->where('no_kp', 'LIKE', '%'.$request->search.'%')->orwhere('name', 'LIKE', '%'.$request->search.'%');
                });
            })
            ->orWhere('tarikh_mula', 'LIKE', '%'.$request->search.'%')
            ->orWhere('tarikh_tamat', 'LIKE', '%'.$request->search.'%')
            ->paginate(20)
            ->withQueryString();
        }
        else
        {
            $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $kod_negara)->paginate(5)->withQueryString();
        }

        return view('kedutaan.pengajianpelajar.index', compact('user', 'senaraiPengajianPelajar'));
    }

    public function indexShow(Request $request, $negarapengajian)
    {
        $user = auth()->user();
        $negara = $user->negara;
        $kod_negara = $negara->kod_negara;

        // $pengajian = DB::table('pengajian_pelajar')
        // ->join('profil_pelajar', 'pengajian_pelajar.profil_pelajar_id', '=', 'profil_pelajar.id')
        // ->join('negara', 'pengajian_pelajar.kod_negara', '=', 'negara.kod_negara')
        // ->get();
        // dd($pengajian);

        if($request->search != null)
        {
            // dd($request);
            //perform search

            // $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $kod_negara)
            // ->where('kod_negara', 'LIKE', '%'.$request->search.'%')
            // ->orWhere('kod_states', 'LIKE', '%'.$request->search.'%')
            // ->orWhere('tarikh_mula', 'LIKE', '%'.$request->search.'%')
            // ->orWhere('tarikh_tamat', 'LIKE', '%'.$request->search.'%')
            // ->paginate(10)
            // ->withQueryString();

            $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $kod_negara)
            ->whereHas('negara', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('institusi', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('tahap_pengajian', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('bidang', function($q) use($request)
            {
                $q->where('nama_bidang', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('program_pengajian', function($q) use($request)
            {
                $q->where('keterangan', 'LIKE', '%'.$request->search.'%');
            })
            ->orWhereHas('profil_pelajar', function($q) use($request)
            {
                $q->whereHas('users', function($q2) use($request)
                {
                    $q2->where('no_kp', 'LIKE', '%'.$request->search.'%')->orwhere('name', 'LIKE', '%'.$request->search.'%');
                });
            })
            ->orWhere('tarikh_mula', 'LIKE', '%'.$request->search.'%')
            ->orWhere('tarikh_tamat', 'LIKE', '%'.$request->search.'%')
            ->paginate(20)
            ->withQueryString();
        }
        else
        {
            $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $kod_negara)->paginate(5)->withQueryString();
        }
        
        return view('kedutaan.pengajianpelajar.indexShow', compact('user', 'senaraiPengajianPelajar'));
    }

    public function edit(PengajianPelajar $pengajianpelajar, $negarapengajian)
    {
        $user = Auth::user();
        // dd($user->negara->kod_negara);

        // dd('masuk edit');
        $senaraiNegara = Negara::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidang = Bidang::get();
        $senaraiState = States::where('kod_negara', $user->negara->kod_negara)->get();
        // dd($senaraiState);

        return view('kedutaan.pengajianpelajar.edit', compact(
            [
                'pengajianpelajar',
                'senaraiNegara',
                'senaraiTahapPengajian',
                'senaraiBidang',
                'senaraiState',
                'negarapengajian'
            ]
        ));
    }

    public function update(Request $request, PengajianPelajar $pengajianpelajar)
    {
        // dd($request);

        $pengajianpelajar->kod_states = $request->state;
        $pengajianpelajar->institusi_id = $request->institusi;
        $pengajianpelajar->tahap_pengajian_id = $request->tahapPengajian;
        $pengajianpelajar->kod_bidang = $request->bidangPengajian;
        $pengajianpelajar->program_pengajian_id = $request->programPengajian;
        $pengajianpelajar->tarikh_mula = $request->tarikh_mula;
        $pengajianpelajar->tarikh_tamat = $request->tarikh_tamat;
        $pengajianpelajar->save();

        // dd('updated');

        return redirect()->route('kedutaan-pengajianpelajar:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Maklumat Pengajian sudah berjaya dikemaskini'
            ]);
    }

    //populate
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
}
