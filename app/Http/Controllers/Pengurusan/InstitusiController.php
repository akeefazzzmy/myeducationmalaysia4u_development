<?php

namespace App\Http\Controllers\Pengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Negara;
use App\Models\State;
use App\Models\Institusi;

class InstitusiController extends Controller
{
    public function senarai()
    {
        //query all data from table 'negeri' using model
        $senarai_inst = Institusi::orderBy('Kod_Institusi', 'ASC')->where('NamaInstitusi', '!=', 'TIADA MAKLUMAT')->get();

        // return to view with data
        //resources/views/pengurusan/state/senarai.blade.php
        return view('pengurusan.institusi.senarai', compact('senarai_inst'));
    }

    public function lihat(Institusi $institusi)
    {
        //resources/views/pengurusan/negeri/lihat.blade.php
        return view('pengurusan.institusi.lihat', compact('institusi'));
    }

    public function kemaskini(Institusi $institusi, Request $request)
    {
        // dd($request);

        // $this->validate(
        //     $request,
        //     [
        //         'NamaInstitusi' => 'required|min:5',
        //         'Status' => 'required'
        //     ],
        //     [
        //         'NamaInstitusi.min' => 'Nama Institusi wajib di isi sekurang-kurangnya 5 karektor'
        //     ]
        // );
        //    $institusi->Nama_Institusi = $request->NamaInstitusi;
        //    $institusi->StatusKod =$request->Status;
        //    $institusi->save();

        Institusi::updateOrCreate(
            [
                'Kod_Institusi' => $request->KodInstitusi
            ],
            [
                'Kod_Institusi'=>$request->KodInstitusi,
                'Kod_State'=>$request->KodState,
                'NamaInstitusi' => $request->NamaInstitusi,
                'Kod_Status' => $request->Status,
                'Id_PegawaiKemaskini'=>$request->idPeg,
                'Tarikh_Kemaskini'=>Carbon::now(),
            ]
        );

        //    return redirect()->back()->with('status','Berjaya dikemaskini maklumat Institusi');
        return redirect()->to('pengurusan/institusi')->with('status', 'Maklumat Institusi '.$request->NamaInstitusi.' berjaya dikemaskini');
    }

    public function showCreateNew(Request $request)
    {
        // dd("masuk create state baru");
        // return redirect()->to('pengurusan/state')->with('status','Berjaya dikemaskini maklumat State');
        // $list['kodNegara']=Negara::select('Kod_Negara', 'Keterangan')->get();
        // dd($list['kodNegara']);
        // return view('pengurusan.institusi.create')->with($list);

        $list['negara'] = Negara::select('Keterangan', 'Kod_Negara')->orderBy('Keterangan', 'ASC')->get();
        $list['kodState'] = State::select('Kod_State')->get();
        // dd($list['negara']);
        // dd($list['kodState']);
        return view('pengurusan.institusi.create')->with($list);
    }

    public function populateKodState(Request $request)
    {
        $kodNegara = $request->kodNegara;
        $list['kodState'] = State::where('Kod_Negara', $kodNegara)->where('NamaState', '!=', 'TIADA MAKLUMAT')->select('Kod_State', 'NamaState')->get();
        return $list;
    }

    public function populateKodInstitusi(Request $request)
    {
        $kodState = $request->kodState;
        $institusi = Institusi::where('Kod_State', $kodState)->select('Kod_Institusi', 'Kod_State')->orderBy('Kod_Institusi', 'DESC')->first();
        $kodStateCharacterLength = strlen($institusi->Kod_State);
        $kodInstitusiCharacterLength = strlen($institusi->Kod_Institusi);
        $kodBaru = substr($institusi->Kod_Institusi, $kodStateCharacterLength, $kodInstitusiCharacterLength);
        $kodBaruTambahSatu = $kodBaru + 1;
        return $kodBaruTambahSatu;
    }

    public function adminCreateSimpan(Request $request)
    {
        // dd($request);
        Institusi::updateOrCreate(
            [
                'Kod_Institusi' => $request->kodInstitusi,
            ],
            [
                'Kod_Institusi' => $request->kodInstitusi,
                'NamaInstitusi' => $request->namaInstitusi,
                'Kod_State' => $request->kodState,
                'Kod_Status' => $request->statusKeaktifan,
                'Id_Pegawai' => $request->idPeg,
                'Tarikh_Wujud' => Carbon::now(),
                'Id_PegawaiKemaskini' => $request->idPeg,
                'Tarikh_Kemaskini'=>Carbon::now(),
            ]
        );

        // return json_encode(['data'=>'succcess'],200);
        return redirect()->to('/pengurusan/institusi')->with('status', 'Pendaftaran Institusi "'.$request->namaInstitusi.'" telah berjaya');
        // return redirect('pengurusan/state')->with('status', 'Daftar State berjaya ditambah');
    }
}
