<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Negara;
use App\Models\Capaian;
use App\Models\StatusUsers;
use Hash;
use Mail;

class PenggunaKedutaanController extends Controller
{
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $senaraiUserKedutaan = User::where('capaian_id', '4')
                        ->where('no_kp', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('name', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('no_tel', 'LIKE', '%'.$request->search.'%')
                        ->paginate(10)
                        ->withQueryString();
        }
        else
        {
            $senaraiUserKedutaan = User::where('capaian_id', '4')->paginate(5);
        }

        return view('admin.penggunakedutaan.index', compact('senaraiUserKedutaan'));
    }
    public function create()
    {
        $capaian = Capaian::where('id', '4')->first();
        $statusUser = StatusUsers::where('id', '1')->first();
        $senaraiNegara = Negara::get()->sortBy('keterangan');

        return view('admin.penggunakedutaan.create', compact('senaraiNegara', 'capaian', 'statusUser'));
    }

    public function store(Request $request, $capaianID, $statusUser)
    {
        // dd($statusUser);

        $noKpPendaftar = auth()->user()->no_kp;

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 8);

        // dd($request);
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
        $user->negara_id = $request->negara;
        $user->save();

        Mail::send(
            'email.create-user-email',
            [
                'nama' => $request->name,
                'pengguna' => 'Kedutaan', //tahap capaian kedutaan
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

        return redirect()->route('admin-penggunaKedutaan:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Pengguna(Kedutaan) sudah berjaya ditambah'
            ]
        );
    }
}
