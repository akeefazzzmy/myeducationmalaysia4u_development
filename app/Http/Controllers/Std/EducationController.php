<?php

namespace App\Http\Controllers\Std;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Pengajian;
use App\Models\Negara;
use App\Models\State;
use App\Models\Peringkat;
use App\Models\Bidang;
use App\Models\Program;
use App\Models\Waris;
use App\Models\Pelajar;
use App\Models\Tajaan;
use App\Models\Institusi;
use App\Models\StatusPengajian;

class EducationController extends Controller
{
    public function stdEduList()
    {
        $user = auth()->user();
        $nokp = $user->no_kp;
        $pelajar = Pelajar::where('no_kp', '=',$nokp)->first();
        $waris = Waris::where('no_kp', '=',$nokp)->first();

        $senaraipengajian = Pengajian::where('no_kp', $nokp)->get();
        $negara = Negara::all();
        $peringkat = Peringkat::all();
        $bidang = Bidang::all();
        $program = Program::all();
        $statuspengajian = StatusPengajian::all();
        // dd($senaraipengajian);

        if (($pelajar->Status == 'Y') && ($waris->Status == 'Y'))
        {
            return view('std.std-edu-list', compact(['senaraipengajian','user','negara','peringkat','bidang','program','statuspengajian']));
        }
        else if (($pelajar->Status == 'Y') && ($waris->Status == 'X')) {
            return redirect('/std/std-waris')->with('warning', 'Sila isikan maklumat waris pelajar terlebih dahulu');
           // return Redirect::back()->withErrors(['status', 'Sila isikan maklumat peribadi pelajar terlebih dahulu']);
        }
        else
        {
            return redirect('std/std-detail')->with('warning', 'Sila isikan maklumat peribadi pelajar terlebih dahulu');
        }

//       return view('std.std-edu-list', compact(['senaraipengajian','user']));
    }

    public function stdEduShow()
    {
        $user = auth()->user();
        $nokp = $user->no_kp;
        $education = Pengajian::where('no_kp', '=', $nokp)->first();

        $negara = Negara::all();
        $state = State::all();
        $peringkat = Peringkat::all();
        $bidang = Bidang::all();
        $program = Program::all();
        $institusi = Institusi::all();
        $statuspengajian = StatusPengajian::all();
        $penaja = Tajaan::all();

        return view('std.std-edu-show', compact(['user','education','state','negara','institusi','peringkat','bidang','program','statuspengajian','penaja']));
    }

    public function dropDown()
    {
        $data['negara'] = Negara::get(["Keterangan","Kod_Negara"]);
        $data['bidang'] = Bidang::get(["NamaBidang","Kod_Bidang"]);
        return view('std.std-edu-show', $data);
    }

     public function getState(Request $request)
    {
        $data['states'] = State::where("Kod_Negara", $request->country_id)->get(["NamaState","Kod_State"]);

        return response()->json($data);
    }

    public function getInstitusi(Request $request)
    {
        $data['institusi'] = Institusi::where("Kod_State", $request->state_id)->get(["NamaInstitusi","Kod_Institusi"]);

        return response()->json($data);
    }

     public function getProgram(Request $request)
    {
        $data['program'] = Program::where("Kod_Bidang", $request->bidang_id)->get(["NamaProgram","Kod_Program"]);

        return response()->json($data);
    }

    public function stdEduSimpan(Request $request)
    {
        $user = auth()->user();
        $nokp = $user->no_kp;
        $education = Pengajian::where('no_kp', '=', $nokp)->first();

        $education->Kod_Negara = $request->country;
        $education->Kod_State = $request->state;
        $education->Kod_Institusi = $request->institusi;
        $education->Kod_Peringkat = $request->Kod_Peringkat;
        $education->Kod_Bidang = $request->bidang;
        $education->Kod_Program = $request->program;
        $education->Kod_Penaja = $request->Kod_Penaja;
        $education->TarikhMula = $request->TarikhMula;
        $education->TarikhTamat = $request->TarikhTamat;
        $education->Kod_StatusPengajian = $request->Kod_StatusPengajian;
        $education->Tarikh_Wujud = now();
        $education->Id_Wujud = $nokp;
        $education->save();

        return redirect()->to('std/std-edu')->with('status', 'Rekod Pengajian berjaya disimpan');
    }

    public function stdEduShowUpdate(Pengajian $edu)
    {
        $user = auth()->user();

        $negara = Negara::all();
        $state = State::all();
        $peringkat = Peringkat::all();
        $bidang = Bidang::all();
        $program = Program::all();
        $institusi = Institusi::all();
        $statuspengajian = StatusPengajian::all();
        $penaja = Tajaan::all();

        return view('std.std-edu-update', compact(['user','edu','state','negara','institusi','peringkat','bidang','program','statuspengajian','penaja']));
    }

    public function stdEduUpdate(Pengajian $edu,Request $request)
    {
        $user = auth()->user();
        $nokp = $user->no_kp;

        $edu->Kod_Negara = $request->country;
        $edu->Kod_State = $request->state;
        $edu->Kod_Institusi = $request->institusi;
        $edu->Kod_Peringkat = $request->Kod_Peringkat;
        $edu->Kod_Bidang = $request->bidang;
        $edu->Kod_Program = $request->program;
        $edu->Kod_Penaja = $request->Kod_Penaja;
        $edu->TarikhMula = $request->TarikhMula;
        $edu->TarikhTamat = $request->TarikhTamat;
        $edu->Kod_StatusPengajian = $request->Kod_StatusPengajian;
        $edu->Tarikh_Kemaskini = now();
        $edu->Id_Kemaskini = $nokp;
        $edu->save();


        return redirect()->to('std/std-edu')->with('status', 'Rekod Pengajian berjaya dikemaskini');
    }

    public function stdEduSimpan2(Request $request)
    {
        $user = auth()->user();
        $nokp = $user->no_kp;
        $pelajar = Pelajar::where('no_kp', '=', $nokp)->first();

        $education = new Pengajian();
        $education->Id_Pelajar = $pelajar->Id;
        $education->no_kp = $pelajar->no_kp;
        $education->Kod_Negara = $request->country;
        $education->Kod_State = $request->state;
        $education->Kod_Institusi = $request->institusi;
        $education->Kod_Peringkat = $request->Kod_Peringkat;
        $education->Kod_Bidang = $request->bidang;
        $education->Kod_Program = $request->program;
        $education->Kod_Penaja = $request->Kod_Penaja;
        $education->TarikhMula = $request->TarikhMula;
        $education->TarikhTamat = $request->TarikhTamat;
        $education->Kod_StatusPengajian = $request->Kod_StatusPengajian;
        $education->Tarikh_Wujud = now();
        $education->Id_Wujud = $nokp;
        $education->save();

        return redirect()->to('std/std-edu')->with('status', 'Rekod Pengajian berjaya disimpan');
    }

}
