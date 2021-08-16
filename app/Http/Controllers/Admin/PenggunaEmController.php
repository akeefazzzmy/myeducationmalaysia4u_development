<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Mail;
use App\Models\User;
use App\Models\Capaian;
use App\Models\StatusUsers;
use App\Models\Em;

class PenggunaEmController extends Controller
{
    //
    public function index(Request $request)
    {
        // $senaraiUserEm = User::where('capaian_id', '3')->get();

        // return view('admin.penggunaem.index', compact('senaraiUserEm'));

        if($request->search != null)
        {
            //perform search
            $senaraiUserEm = User::where('capaian_id', '3')
                        ->where('no_kp', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('name', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('no_tel', 'LIKE', '%'.$request->search.'%')
                        ->paginate(10)
                        ->withQueryString();
        }
        else
        {
            $senaraiUserEm = User::where('capaian_id', '3')->paginate(5);
        }

        return view('admin.penggunaem.index', compact('senaraiUserEm'));
    }
    public function create()
    {
        // dd("masuk");
        $capaian = Capaian::where('id', '3')->first();
        $statusUser = StatusUsers::where('id', '1')->first();
        $senaraiEm = Em::orderBy('kod_em')->get();

        return view('admin.penggunaem.create', compact('capaian', 'statusUser', 'senaraiEm'));
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
        $user->em_id = $request->em;
        $user->save();

        Mail::send(
            'email.create-user-email',
            [
                'nama' => $request->name,
                'pengguna' => 'Pegawai Education Malaysia', //tahap capaian pengguna_em
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

        return redirect()->route('admin-penggunaEm:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Pengguna(Education Malaysia) sudah berjaya ditambah'
            ]
        );
    }
    public function edit(User $user)
    {
        $senaraiCapaian = Capaian::where('id', '!=', '5')->get();
        $senaraiEM = Em::get();
        $senaraiStatus = StatusUsers::get();

        return view('admin.penggunaem.edit', compact('user', 'senaraiCapaian', 'senaraiEM', 'senaraiStatus'));
    }
    public function update(User $user, Request $request)
    {
        // dd($request);
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

        return redirect()->route('admin-penggunaEm:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Pengguna(Pegawai EM) sudah berjaya dikemaskini'
            ]);
    }
}
