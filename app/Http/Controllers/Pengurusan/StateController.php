<?php

namespace App\Http\Controllers\Pengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\EduMas;
use App\Models\Liputan;
use App\Models\Negara;
use App\Models\Institusi;

use Auth;

use Carbon\Carbon;

class StateController extends Controller
{
    public function senarai()
    {
        $user = auth()->user();
        $KodCapai = $user->Kod_Capaian;

        if($KodCapai == '01')
        {
            //query only for KPT
            // $senarai_state = State::orderBy('Kod_State','ASC')->get();
            $senarai_state = State::orderBy('Kod_State','ASC')->where('NamaState', '!=', 'TIADA MAKLUMAT')->get();

        }
        else
        {
                $senarai_state = State::where('Kod_Negara','=',$KodCapai)->where('Kod_State', '!=', '00')->get();
        }
        // return to view with data
        //resources/views/pengurusan/state/senarai.blade.php
        return view('pengurusan.state.senarai', compact('senarai_state'));

    }

    public function lihat(State $state)
    {
         //resources/views/pengurusan/negeri/lihat.blade.php
        return view('pengurusan.state.lihat', compact('state'));
    }

    // public function kemaskini(State $state, Request $request)
    // {
    //     $this->validate(
    //         $request,
    //         [
    //             'NamaState' => 'required|min:5',
    //             'Status' => 'required'
    //         ],
    //         [
    //             'NamaState.min' => 'Nama State wajib di isi sekurang-kurangnya 5 karektor'
    //         ]
    //     );
    //     $state->NamaState = $request->NamaState;
    //     $state->Kod_Status =$request->Status;
    //     $state->save();

    //     return redirect()->to('pengurusan/state')->with('status','Berjaya dikemaskini maklumat State');
    // }

    public function kemaskini(State $state, Request $request)
    {
        // dd($request);
        $this->validate(
            $request,
            [
                'NamaState' => 'required|min:5',
                'Status' => 'required'
            ],
            [
                'NamaState.min' => 'Nama State wajib di isi sekurang-kurangnya 5 karektor'
            ]
        );
        // $state->NamaState = $request->NamaState;
        // $state->Kod_Status =$request->Status;
        // $state->save();

        State::updateOrCreate(
            [
                'Kod_State'=>$request->KodState
            ],
            [
                'NamaState'=>$request->NamaState,
                'Kod_Status'=>$request->Status,
                'Id_PegawaiKemaskini'=>$request->idPeg,
                'Tarikh_Kemaskini'=>Carbon::now(),
            ]
        );

        return redirect()->to('pengurusan/state')->with('status','Maklumat State "'.$request->NamaState.'" berjaya dikemaskini');
    }
    
    public function showCreateNew(Request $request)
    {
        // dd("masuk create state baru");
        // return redirect()->to('pengurusan/state')->with('status','Berjaya dikemaskini maklumat State');
        $list['kodNegara']=Negara::select('Kod_Negara', 'Keterangan')->get();
        // dd($list['kodNegara']);
        return view('pengurusan.state.create')->with($list);
    }

    public function adminCreateSimpan(Request $request)
    {
        // dd($request);
        $kodState = $request->kodState;
        $kodStateString = (string)$kodState;
        $numberZero = '00';
        $kodInstitusi = $kodState.''.$numberZero;

        State::updateOrCreate(
            [
                'Kod_State'=>$kodState,
            ],
            [
                'Kod_State'=>$kodState,
                'NamaState'=>$request->namaState,
                'Kod_Negara'=>$request->kodNegara,
                'Kod_Status'=>$request->statusKeaktifan,
                'Id_Pegawai'=>$request->idPeg,
                'Tarikh_Wujud'=>Carbon::now(),
                'Id_PegawaiKemaskini'=>$request->idPeg,
                'Tarikh_Kemaskini'=>Carbon::now(),
            ]
        );

        Institusi::updateOrCreate(
            [
                'Kod_Institusi'=>$kodInstitusi
            ],
            [
                'Kod_Institusi'=>$kodInstitusi,
                'NamaInstitusi'=>'Tiada Maklumat',
                'Kod_State'=>$kodState,
                'Kod_Status'=>'0',
                'Id_Pegawai'=>$request->idPeg,
                'Tarikh_Wujud'=>Carbon::now(),
                'Id_PegawaiKemaskini'=>$request->idPeg,
                'Tarikh_Kemaskini'=>Carbon::now(),
            ]
        );

        // return json_encode(['data'=>'succcess'],200);
        return redirect()->to('/pengurusan/state')->with('status', 'Pendaftaran State "'.$request->namaState.'" berjaya');
        // return redirect('pengurusan/state')->with('status', 'Daftar State berjaya ditambah');
    }

    public function populateKodNegara(Request $request)
    {
        $kodNegara = $request->kodNegara;
        $list['kodState']=State::where('Kod_Negara', $kodNegara)->orderBy('Kod_State', 'DESC')->first();
        $kodState = $list['kodState']->Kod_State;
        $kodStateNomborSahaja = preg_replace("/[^0-9]/", "", $kodState);
        $kodStateNomborSahajaBaru = $kodStateNomborSahaja + 1;
        
        return $kodStateNomborSahajaBaru; //hantar dekat blade state\create.blade.php
    }

}
