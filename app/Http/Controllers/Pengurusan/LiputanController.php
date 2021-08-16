<?php

namespace App\Http\Controllers\Pengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EduMas;
use App\Models\Liputan;
use App\Models\Negara;
use App\Models\State;
use App\Models\Institusi;
use Auth;

class LiputanController extends Controller
{
    public function senaraiNegara(Request $request)
    {
        $kp = auth()->user()->no_kp;
        $kodCapaian = auth()->user()->Kod_Capaian;

        $kodNegara = User::select('Kod_Negara')->where('no_kp', $kp)->where('Kod_Capaian', $kodCapaian)->first();
        $list['liputan'] = Liputan::where('Kod_EM', $kodNegara->Kod_Negara)->get();
        // dd($list['liputan']);

        return view('pengurusan.liputan.senaraiNegara')->with($list);

        //coding asal
    //     $user = auth()->user();
    //     $KodCapai = $user->Kod_Capaian;
    //     //query all data from table 'negeri' using model
    //     $senarai_negara = Negara::all();
    //     if($KodCapai <> '02')
    //    {    $KodEM = EduMas::where('Kod_NegaraEM', '=', $KodCapai)->first();


    //         $senarai_Liputan = Liputan::where('Kod_EM', '=', $KodEM)->get();
    //     }
    //     //$negara = Negara::all();
    //     // return to view with data
    //     //resources/views/pengurusan/state/senarai.blade.php
    //     return view('pengurusan.liputan.senarai', compact(['senarai_negara','senarai_Liputan']));
        //coding asal end

    //coding baru
    // $tahapCapaian = auth()->user()->Kod_Capaian;
    // dd($request);
    //     if(auth()->user()->Kod_Capaian == '02')
    //     {
    //         // dd("masuk Pegawai BEM");
    //     }
    //     elseif(auth()->user()->Kod_Capaian == '03')
    //     {
    //         $kodNegara = auth()->user()->Kod_Negara;
    //         $list['em'] = EduMas::where('Kod_EM', $kodNegara)->first();
    //         $list['wilayahLiputan'] = Liputan::with('Negara', 'EduMas')->where('Kod_EM', $list['em']->Kod_EM)->get();
    //         // dd($list['wilayahLiputan']);
    //     }
    //     elseif(auth()->user()->Kod_Capaian == '05')
    //     {            
    //     }

    //     return view('pengurusan.liputan.senaraiWilayah')->with($list);
    //coding baru end

    }

    public function senaraiState(Request $request)
    {
        $kp = auth()->user()->no_kp;
        $kodCapaian = auth()->user()->Kod_Capaian;

        $kodNegara = User::select('Kod_Negara')->where('no_kp', $kp)->where('Kod_Capaian', $kodCapaian)->first();
        $list['liputan'] = Liputan::where('Kod_EM', $kodNegara->Kod_Negara)->get();
        // dd($list['liputan']);

        return view('pengurusan.liputan.senaraiState')->with($list);
    }

    public function senaraiInstitusi(Request $request)
    {
        $kod = auth()->user()->Kod_Negara;
        // dd(auth()->user());

        $liputan = Liputan::where('Kod_EM', $kod)->get();
        // dd($liputan);
        foreach($liputan as $liputans)
        {
            $kod_negaraLiputan = $liputans->Kod_NegaraLiputan;
        }
        
        // dd($kod_negaraLiputan);
        $list['institusi'] = Institusi::where('NamaInstitusi', '!=', 'Tiada Maklumat')->where('Kod_Institusi', 'LIKE', '%'.$kod_negaraLiputan.'%')->get();
        // dd($list['institusi']);
        // foreach($institusi as $institusis)
        // {
        //     $kod_state_trimmed = trim($institusis->Kod_State, " 0..9");
        // }

        return view('pengurusan.liputan.senaraiInstitusi')->with($list);
    }

    public function EMPopulateState(Request $request)
    {
        $kodNegara = $request->kodNegara;

        $state = State::where('Kod_Negara', $kodNegara)->where('NamaState', '!=', 'TIADA MAKLUMAT')->get();
        // dd($state);
        return $state;
    }
}
