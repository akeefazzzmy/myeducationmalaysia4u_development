<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;

class ResetPwdController extends Controller
{
    public function index()
    {
        return view('reset');
    }

    public function resetProcess(Request $request)
    {
        $user = auth()->user();
        $user = User::where('no_kp', $request->nokp)->first();

        if($user)
        {
            $email = User::where('Emel', $request->email)->first();

            if(($user->Emel)==( $request->email))
            {
             // generate random 8 char password from below chars
                $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
                $password = substr($random, 0, 8);

                $user->Pswd = Hash::make($password);
                $user->Tarikh_LogMasuk = now();
                $user->save();

                //notify : send email to noordiana.zaharah@gmail.com
                //method 1
                Mail::send('email.reset-pwd-email', [
                    'Nama'=> $user->Nama,
                    'no_kp' => $user->no_kp,
                    'Pswd' => $password ],
                                function ($message) {
                                        $message->from('noordiana@mohe.gov.my');
                                        $message->to('noordiana.zaharah@gmail.com', 'Diana')
                                        ->subject('Reset Kata Laluan');
                                    });

                return redirect()->route('new-login:ui')->with('success','Kata Laluan berjaya di reset dan telah di hantar ke emel yang didaftarkan.');
            }
            else{
                return redirect()->to('reset-pwd')->with('status','Ralat.Emel yang didaftarkan tidak sama. Sila hubungi pentadbir sistem.');
            }

        }
        else{
            return redirect()->to('reset-pwd')->with('status','Ralat. ID Pengguna tidak wujud. Sila daftar pengguna baru di dalam sistem.');
        }
    }

}
