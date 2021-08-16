<?php

namespace App\Http\Controllers\Pengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pelajar;
use App\Models\EduMas;
use App\Models\Negara;
use App\Models\Capaian;
use Mail;

class AdminController extends Controller
{
    public function senarai()
    {
        $user = auth()->user();
        $KodCapai = $user->Kod_Capaian;
        $KodNegara =  $user->Kod_Negara;

        // if($KodCapai == '01' || $KodCapai == '02')
        // {
        //     //query only for KPT
        //     $senarai_admin = User::where('Kod_Capaian','<>','04')
        //                     ->where('no_kp','<>',$user->no_kp)
        //                     ->get();

        // }
        // else
        // {
        //         $senarai_admin = User::where('Kod_Negara','=',$KodNegara)->get();
        // }

        // $senarai_admin = User::where('Kod_Capaian','01')->where('no_kp','<>',$user->no_kp)->get();
        $list['senarai_admin'] = User::where('Kod_Capaian','01')->get();
        $list['senarai_pegBEM'] = User::where('Kod_Capaian','02')->get();
        $list['senarai_EM'] = User::where('Kod_Capaian','03')->get();
        $list['senarai_kedutaan'] = User::where('Kod_Capaian','05')->get();
        $list['senarai_pelajar'] = User::where('Kod_Capaian','04')->get();
        // return to view with data
        //resources/views/pengurusan/state/senarai.blade.php
        // return view('pengurusan.admin.senarai', compact('senarai_admin'));
        return view('pengurusan.admin.senarai')->with($list);

    }

    public function showCreateNew()
    {
        // //coding asal
        // //$user = auth()->user();
        // $negara = Negara::all();
        // // $KodCapai = Capaian::where('Kod_Capaian','<>','04')->get();
        //  //resources/views/pengurusan/negeri/lihat.blade.php
        // $KodCapai = Capaian::get();
        // return view('pengurusan.admin.create', compact(['negara','KodCapai']));
        // //coding asal end

        $negara = Negara::all();
        $KodCapai = Capaian::get();
        $eduMas = EduMas::get();
        return view('pengurusan.admin.create', compact(['eduMas','KodCapai']));
    }

    public function adminCreateSimpan(Request $request)
    {
        // dd($request);
        if (User::where('no_kp', '=',  $request->no_kpPengguna)->where('Kod_Capaian', '=', $request->KodCapaian)->exists() && Pelajar::where('no_kp', '=',  $request->no_kpPengguna)->exists())
        {
            return back()->with('danger', 'Pendaftaran pengguna baru gagal diwujudkan. Rekod telah wujud didalam sistem.');
        }
        else
        {
            $user = auth()->user();
            $nokp = $user->no_kp;
            // generate random 8 char password from below chars
            $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
            $password = substr($random, 0, 8);

            // if($request->KodCapaian == '02') //Pegawai BEM
            // {
            //     // dd("masuk daftar peg bem");
            //     $kodNegara = 'MYS';
            //     $kodCapaian = $request->KodCapaian;
            // }
            // elseif($request->KodCapaian == '03') //EM
            // {
            //     // dd("masuk daftar em");
            //     $kodNegara = $request->Kod_Negara;
            //     $kodCapaian = $request->KodCapaian;
            // }
            // elseif($request->KodCapaian == '05') //Kedutaan
            // {
            //     // dd("masuk daftar kedutaan");
            //     $kodNegara = $request->Kod_Negara;
            //     $kodCapaian = $request->KodCapaian;
            // }
            // elseif($request->KodCapaian == '04') //Pelajar
            // {
            //     $kodNegara = $request->Kod_Negara;
            //     $kodCapaian = $request->KodCapaian;
                
            //     $tablePelajar = new Pelajar();
            //     $tablePelajar->no_kp = $request->no_kpPengguna;
            // }

            
            //
            if($request->KodCapaian == '04')
            {
                //save dalam model User\table pln_tbl_login
                $admin = new User();
                $admin->no_kp = $request->no_kpPengguna;
                $admin->Nama = $request->NamaPengguna;
                $admin->NoTel = $request->Telefon;
                $admin->Emel = $request->Emel;
                $admin->Kod_Capaian = $request->KodCapaian;
                $admin->Kod_Negara = $request->Kod_Negara;
                $admin->Kod_Status = $request->Kod_Status;
                $admin->Pswd = Hash::make($password);
                $admin->Tarikh_Wujud = now();
                $admin->Id_Wujud = $nokp;
                $admin->save();
                //end
                
                $tablePelajar = new Pelajar();
                $tablePelajar->no_kp = $request->no_kpPengguna;
                $tablePelajar->save();
            }
            else
            {
                //save dalam model User\table pln_tbl_login
                $admin = new User();
                $admin->no_kp = $request->no_kpPengguna;
                $admin->Nama = $request->NamaPengguna;
                $admin->NoTel = $request->Telefon;
                $admin->Emel = $request->Emel;
                $admin->Kod_Capaian = $request->KodCapaian;
                $admin->Kod_Negara = $request->Kod_Negara;
                $admin->Kod_Status = $request->Kod_Status;
                $admin->Pswd = Hash::make($password);
                $admin->Tarikh_Wujud = now();
                $admin->Id_Wujud = $nokp;
                $admin->save();
                //end
            }
            //

            $tahapCapaian = Capaian::where('Kod_Capaian', $request->KodCapaian)->select('Keterangan')->first();

            //notify : send email to noordiana.zaharah@gmail.com
            //method 1
            Mail::send('email.create-user-email',
            [
                'Nama'=> $request->NamaPengguna,
                'no_kp' => $request->no_kpPengguna,
                'TahapCapaian' => $tahapCapaian->Keterangan,
                'Pswd' => $password
            ],
            function ($message)
            {
                $message->from('noordiana@mohe.gov.my');
                $message->to('noordiana.zaharah@gmail.com', 'Diana')->subject('Pengguna Baharu Dicipta');
            });

            return redirect()->to('pengurusan/admin')->with('status', 'Pendaftaran '.$tahapCapaian->Keterangan.'('.$request->NamaPengguna.') berjaya');
        }
    }

  public function showAdmin(User $admin)
    {
        // dd($admin);
        // $user = auth()->user();
        $admin = User::where('Id','=',$admin->Id)->first();
        $negara = Negara::all();
        $KodCapai = Capaian::all();

        // dd($admin);

         //resources/views/pengurusan/negeri/lihat.blade.php
        return view('pengurusan.admin.lihat', compact(['admin','negara','KodCapai']));
    }

    public function updateAdmin(User $admin,Request $request)
    {
        $admin->NoTel = $request->Telefon;
        $admin->Emel = $request->Emel;
        $admin->Kod_Capaian = $request->KodCapaian;
        $admin->Kod_Negara = $request->Kod_Negara;
        $admin->Kod_Status = $request->Kod_Status;
        $admin->save();

        return redirect()->to('pengurusan/admin')->with('status','Maklumat berjaya dikemaskini');
    }
}
