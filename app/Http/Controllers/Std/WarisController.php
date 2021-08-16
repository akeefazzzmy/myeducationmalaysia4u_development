<?php

namespace App\Http\Controllers\Std;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Waris;
use App\Models\Pelajar;
use App\Models\Hubungan;
use App\Models\Negeri;
use App\Models\Negara;

class WarisController extends Controller
{
    public function stdWarisSenarai()
    {
        $user = auth()->user();
        $nokp = $user->no_kp;
        $pelajar = Pelajar::where('no_kp', '=',$nokp)->first();
       // $StatusWaris = Waris::where('no_kp', '=',$nokp)->first();
        $senaraiwaris = Waris::where('no_kp', $nokp)->get();
        $hubungan = Hubungan::all();

        if ($pelajar->Status == 'Y') {
            return view('std.std-waris', compact(['senaraiwaris','user','hubungan']));
        }
        else{
            return back()->with('warning', 'Sila isikan maklumat peribadi pelajar terlebih dahulu');
           // return Redirect::back()->withErrors(['status', 'Sila isikan maklumat peribadi pelajar terlebih dahulu']);
        }
    }


    public function stdWarisShow()
    {
        $user = auth()->user();
        $nokp = $user->no_kp;
        $waris = Waris::where('no_kp', '=', $nokp)->first();

        $negeri = Negeri::all();
        $negara = Negara::all();
        $hubungan = Hubungan::all();

        return view('std.std-waris-show', compact(['waris','user','hubungan','negeri','negara']));
    }

    public function stdWarisShowUpdate(Waris $waris)
    {
         $user = auth()->user();
       /* $nokp = $user->no_kp;
        $waris = Waris::where('no_kp', '=', $nokp)->first(); */

        $negeri = Negeri::all();
        $negara = Negara::all();
        $hubungan = Hubungan::all();

        return view('std.std-waris-update', compact(['waris','user','hubungan','negeri','negara']));
    }

    public function stdWarisSimpan(Request $request)
    {
        $request->validate([
            'no_kp_Waris' => 'required|int|min:12'
        ],
        [
            'no_kp_Waris.min' => 'No Kad Pengenalan Waris wajib di isi 12 digit'
        ]);

        $user = auth()->user();
        $nokp = $user->no_kp;
        $waris = Waris::where('no_kp', '=', $nokp)->first();

        $waris->no_kp_Waris = $request->no_kp_Waris;
        $waris->Nama_Waris = $request->Nama_Waris;
        $waris->Alamat_Waris = $request->Alamat_Waris;
        $waris->Poskod_Waris = $request->Poskod_Waris;
        $waris->Bandar_Waris = $request->Bandar_Waris;
        $waris->Kod_NegeriWaris = $request->Kod_NegeriWaris;
        $waris->Kod_NegaraWaris = $request->Kod_NegaraWaris;
        $waris->NoTel_Waris = $request->NoTel_Waris;
        $waris->Kod_Hubungan = $request->Hubungan_Waris;
        $waris->Tarikh_Kemaskini = now();
        $waris->Status = 'Y';
        $waris->save();

        return redirect()->to('std/std-waris')->with('status', 'Rekod Waris berjaya disimpan');
        //return redirect()->route('std.std-waris')->with('status', 'Rekod Waris berjaya disimpan');
    }
    public function stdWarisUpdate(Waris $waris,Request $request)
    {
        $request->validate([
            'no_kp_Waris' => 'required|int|min:12'
        ],
        [
            'no_kp_Waris.min' => 'No Kad Pengenalan Waris wajib di isi 12 digit'
        ]);

        $waris->no_kp_Waris = $request->no_kp_Waris;
        $waris->Nama_Waris = $request->Nama_Waris;
        $waris->Alamat_Waris = $request->Alamat_Waris;
        $waris->Poskod_Waris = $request->Poskod_Waris;
        $waris->Bandar_Waris = $request->Bandar_Waris;
        $waris->Kod_NegeriWaris = $request->Kod_NegeriWaris;
        $waris->Kod_NegaraWaris = $request->Kod_NegaraWaris;
        $waris->NoTel_Waris = $request->NoTel_Waris;
        $waris->Kod_Hubungan = $request->Hubungan_Waris;
        $waris->Tarikh_Kemaskini = now();
        $waris->save();

        return redirect()->to('std/std-waris')->with('status', 'Rekod Waris berjaya dikemaskini');
        //return redirect()->route('std.std-waris')->with('status', 'Rekod Waris berjaya disimpan');
    }
    public function stdWarisSimpan2(Request $request)
    {
        $request->validate([
            'no_kp_Waris' => 'required|int|min:12'
        ],
        [
            'no_kp_Waris.min' => 'No Kad Pengenalan Waris wajib di isi 12 digit'
        ]);

        $user = auth()->user();
        $nokp = $user->no_kp;
        $pelajar = Pelajar::where('no_kp', '=', $nokp)->first();

        $waris = new Waris();
        $waris->Id_Pelajar = $pelajar->Id;
        $waris->no_kp = $pelajar->no_kp;
        $waris->no_kp_Waris = $request->no_kp_Waris;
        $waris->Nama_Waris = $request->Nama_Waris;
        $waris->Alamat_Waris = $request->Alamat_Waris;
        $waris->Poskod_Waris = $request->Poskod_Waris;
        $waris->Bandar_Waris = $request->Bandar_Waris;
        $waris->Kod_NegeriWaris = $request->Kod_NegeriWaris;
        $waris->Kod_NegaraWaris = $request->Kod_NegaraWaris;
        $waris->NoTel_Waris = $request->NoTel_Waris;
        $waris->Kod_Hubungan = $request->Hubungan_Waris;
        $waris->Tarikh_Kemaskini = now();
        $waris->Status = 'Y';
        $waris->save();

        return redirect()->to('std/std-waris')->with('status', 'Rekod Waris berjaya ditambah');
        //return redirect()->route('std.std-waris')->with('status', 'Rekod Waris berjaya disimpan');
    }
}
