<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liputan;
use App\Models\Negara;

class welcomeController extends Controller
{
    public function welcomeShow()
    {
        return view('welcome');
    }

    // public function populateEM(Request $request)
    // {
    //     // dd($request);
    //     $kodEM = $request->kodEM;
        
    //     // $list['negara'] = Negara::with('Liputan')->get();
    //     $list['liputan'] = Liputan::with('Negara')->where('Kod_EM', $kodEM)->get();
    //     // foreach($list['liputan'] as $liputan)
    //     // {
    //     //     $kodNegaraLiputan = $liputan->Negara->Keterangan;
    //     // }
    //     // dd($kodNegaraLiputan);
    //     return $list;
    // }
}
