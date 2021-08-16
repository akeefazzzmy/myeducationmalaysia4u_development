<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StatusUsers;

use App\Models\Waris;
use App\Models\Hubungan;

use App\Models\Negara;
use App\Models\Institusi;

use Hash;
use Mail;

class PenggunaPelajarController extends Controller
{
    public function index()
    {
        return view('admin.penggunapelajar.index');
    }
    public function cariPelajarKpShow(Request $request)
    {
        $noKP = $request->nokp;
        $user = User::where('no_kp', $noKP)->where('capaian_id', '5')->first();
        // dd($user);

        if(isset($user))
        {
            $senaraiStatus = StatusUsers::get();
            // return view('admin.penggunapelajar.caripelajarkp', compact('user'));
            return view('admin.penggunapelajar.show', compact('user', 'senaraiStatus'));
        }
        else
        {
            // dd("tiada data");
            $user = User::where('no_kp', $noKP)->where('capaian_id', '!=', '5')->first();
            return view('admin.penggunapelajar.create', compact('user', 'noKP'));
        }
    }
    public function cariPelajarKpShowGet($no_kp)
    {
        // dd($no_kp);
        $user = User::where('no_kp', $no_kp)->where('capaian_id', '5')->first();
        $senaraiStatus = StatusUsers::get();
        return view('admin.penggunapelajar.show', compact('user', 'senaraiStatus'));
    }
    public function cariPelajarKpStore(Request $request)
    {
        // dd($request);
        $noKpPendaftar = auth()->user()->no_kp;

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 8);

        $user = new User();
        $user->no_kp = $request->no_kp;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_tel = $request->no_tel;
        $user->password = Hash::make($password);
        $user->no_kp_wujud = $noKpPendaftar;
        $user->no_kp_kemaskini = $noKpPendaftar;
        $user->capaian_id = 5;
        $user->status_users_id = 1;
        $user->save();

        Mail::send(
            'email.create-user-email',
            [
                'nama' => $request->name,
                'pengguna' => 'Pelajar', //tahap capaian pengguna_admin
                'no_kp' => $request->no_kp,
                'pswd' => $password
            ],
            function($message)
            {
                $message->from('dummyshgfddsmail@gmail.gov.my');
                $message->to('dummymail@gmail.gov.my', 'Dummy')
                        ->subject('Pengguna (Pelajar) Baharu Dicipta');
            }
        );

        dd('masuk');

        return redirect()->route('admin-penggunaAdmin:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Pengguna(Admin) sudah berjaya ditambah'
            ]
        );
    }
    public function cariPelajarKpEdit(User $user)
    {
        // dd($user);
        // $user = User::where('no_kp', $no_kp)->where('capaian_id', '5')->first();
        // dd($user);
        $senaraiStatus = StatusUsers::get();

        return view('admin.penggunapelajar.edit', compact('user', 'senaraiStatus'));
    }
    public function cariPelajarKpUpdate(User $user, Request $request)
    {
        // dd($request);

        $user->status_users_id = $request->statusUser;
        $user->no_kp_kemaskini = auth()->user()->no_kp;
        $user->save();

        return redirect()->route('admin-penggunaPelajar-cariPelajarKp:edit', $user)->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Maklumat pelajar sudah berjaya dikemaskini'
            ]);
    }

    public function cariPelajarKpGet($no_kp)
    {
        // dd($no_kp);

        $user = User::where('no_kp', $no_kp)->first();

        if(isset($user))
        {
            return view('admin.penggunapelajar.caripelajarkp', compact('user'));
        }
        else
        {
            dd("tiada data");
        }
    }

    // WARIS START
    public function createWaris($no_kp, $profilPelajarId)
    {
        $senaraiHubungan = Hubungan::get();
        
        return view('admin.penggunapelajar.waris-create', compact('senaraiHubungan', 'no_kp', 'profilPelajarId'));
    }
    public function storeWaris(Request $request, $no_kp, $profil_pelajar_id)
    {
        // dd($request);

        $waris = new Waris();
        $waris->no_kp = $request->no_kp;
        $waris->nama = $request->nama;
        $waris->alamat = $request->alamat;
        $waris->bandar = $request->bandar;
        $waris->poskod = $request->poskod;
        $waris->no_tel = $request->no_tel;
        $waris->profil_pelajar_id = $profil_pelajar_id;
        $waris->hubungan_id = $request->hubungan;
        $waris->no_kp_wujud = auth()->user()->no_kp;
        $waris->no_kp_kemaskini = auth()->user()->no_kp;
        $waris->save();

        return redirect()->route('admin-penggunaPelajar-waris:create', ['profilPelajarId'=>$profil_pelajar_id, 'no_kp'=>$no_kp])->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Waris sudah berjaya ditambah'
            ]
        );
    }
    public function showWaris(Waris $waris, $no_kp)
    {
        // dd($no_kp);
        return view('admin.penggunapelajar.waris-show', compact('waris', 'no_kp'));
    }
    public function editWaris(Waris $waris, $no_kp)
    {
        $senaraiHubungan = Hubungan::get();
        return view('admin.penggunapelajar.waris-edit', compact('waris', 'no_kp', 'senaraiHubungan'));
    }
    public function updateWaris(Request $request, Waris $waris)
    {
        // dd($waris->profil_pelajar->users->no_kp);
        $waris->no_kp = $request->no_kp;
        $waris->nama = $request->nama;
        $waris->alamat = $request->alamat;
        $waris->bandar = $request->bandar;
        $waris->poskod = $request->poskod;
        $waris->no_tel = $request->no_tel;
        $waris->hubungan_id = $request->hubungan;
        $waris->no_kp_kemaskini = auth()->user()->no_kp;
        $waris->save();

        return redirect()->route('admin-penggunaPelajar-waris:edit', ['waris'=> $waris, 'no_kp'=> $waris->profil_pelajar->users->no_kp])->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Maklumat waris sudah berjaya dikemaskini'
            ]);
    }
    public function destroyWaris(Waris $waris)
    {        
        $waris->delete();

        // dd($waris->profil_pelajar->users->no_kp);

    return redirect()->route('admin-penggunaPelajar:cariPelajarKp-get', $waris->profil_pelajar->users->no_kp)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Waris sudah berjaya dihapuskan'
        ]);
    }
    // WARIS END

    //PENGAJIAN PELAJAR START
    public function createpPengajianPelajar($no_kp, $profilPelajarId)
    {
        $senaraiNegara = Negara::get();
        $senaraiInstitusi = Institusi::get();
        // dd($no_kp);
        return view('admin.penggunapelajar.pengajianpelajar-create', compact('no_kp', 'profilPelajarId', 'senaraiNegara', 'senaraiInstitusi'));
    }
    //PENGAJIAN PELAJAR END

    //POPULATE DATA START
    public function populateNegaraToStates(Request $request)
    {
        dd($request);
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
    //POPULATE DATA END
}
