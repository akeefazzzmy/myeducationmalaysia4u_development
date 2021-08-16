<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Mail;
use App\Models\User;
use App\Models\Capaian;
use App\Models\Em;
use App\Models\StatusUsers;

class PenggunaBemController extends Controller
{
    //
    public function index()
    {
        $senaraiBem = User::where('capaian_id', '2')->get();

        return view('admin.penggunabem.index', compact('senaraiBem'));
    }
    public function create()
    {
        $capaian = Capaian::where('id', '2')->first();
        $statusUser = StatusUsers::where('id', '1')->first();

        return view('admin.penggunabem.create', compact('capaian', 'statusUser'));
    }
    public function store(Request $request, $capaianID, $statusUser)
    {
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
        $user->capaian_id = $capaianID;
        $user->status_users_id = $statusUser;
        $user->save();

        Mail::send(
            'email.create-user-email',
            [
                'nama' => $request->name,
                'pengguna' => 'Pegawai Bahagian Education Malaysia', //tahap capaian pengguna_bem
                'no_kp' => $request->no_kp,
                'pswd' => $password
            ],
            function($message)
            {
                $message->from('dummyshgfddsmail@gmail.gov.my');
                $message->to('dummymail@gmail.gov.my', 'Dummy')
                        ->subject('Pengguna Baharu Dicipta');
            }
        );

        return redirect()->route('admin-penggunaBem:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Pengguna(Bahagian Education Malaysia) sudah berjaya ditambah'
            ]
        );
    }
    public function edit(User $user)
    {
        $senaraiCapaian = Capaian::where('id', '!=', '5')->get();
        $senaraiEM = Em::get();
        $senaraiStatus = StatusUsers::get();

        return view('admin.penggunabem.edit', compact('user', 'senaraiCapaian', 'senaraiEM', 'senaraiStatus'));
    }
    public function update(User $user, Request $request)
    {
        $noKpPengemaskini = auth()->user()->no_kp;

        $user->no_kp = $request->no_kp;
        $user->name = $request->nama;
        $user->email = $request->emel;
        $user->no_tel = $request->no_tel;
        $user->no_kp_kemaskini = $noKpPengemaskini;
        $user->capaian_id = $request->capaianUser;
        $user->status_users_id = $request->statusUser;
        if($request->capaianUser == 3)
        {
            // dd('masuk 3');
            $user->em_id = $request->em;
        }
        else
        {
            // dd('masuk bukan 3');
            $user->em_id = null;
        }
        $user->save();

        return redirect()->route('admin-penggunaBem:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Pengguna(BEM) sudah berjaya dikemaskini'
            ]);
    }
}
