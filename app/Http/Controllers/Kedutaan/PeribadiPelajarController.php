<?php

namespace App\Http\Controllers\Kedutaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PeribadiPelajarController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $senaraiPelajar = User::where('capaian_id', '5')->where('negara_id', $user->negara_id)->get();
        // dd($senaraiPelajar);

        return view('kedutaan.peribadipelajar.index', compact('senaraiPelajar'));
    }
}
