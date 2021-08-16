<?php

namespace App\Http\Controllers\Std;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use File;
use App\Models\User;
use Mail;

class ProfileController extends Controller
{
    public function stdProfile()
    {
        $user = auth()->user();
        return view('std.std-profile', compact('user'));
    }
    public function stdUpdateProfile(Request $request)
    {
        //save to db
        $user = auth()->user();

        $this->validate(
            $request,
            [
                'NAMA' => 'required|min:5',
            ],
            [
                'NAMA.min' => 'Sila isikan nama anda sekurang-kurangnya 5 karektor',
                'NAMA.required' => 'Ruangan Nama ini wajib diisi.',
                'EMAIL.required' => 'Ruangan Email ini wajib diisi.',
                'TELEFON.required' => 'Ruangan Telefon ini wajib diisi.',
            ]
        );

        $user->Nama = $request->NAMA;
        $user->NoTel = $request->TELEFON;
        $user->Emel = $request->EMAIL;
       // $user->Kod_Status = $request->Status;
        $user->save();

        if($request->hasFile('profile_picture')){
            $filename = 'profile-picture-'.$user->no_kp.'-'.date("Y-m-d").".".$request->profile_picture->getClientOriginalExtension();

            Storage::disk('public')->put($filename, File::get($request->profile_picture));

            $user->ImageFile = $filename;
            $user->save();
        }


        return redirect()->to('std/std-profile')->with('status','Maklumat Profil berjaya di kemaskini');
    }

    public function stdProfilePassword()
    {
        return view ('std.std-profile-password');
    }

    public function stdUpdatePassword(Request $request)
    {

        $this->validate(
            $request,
            ['password' => ['required',
                            'string',
                            'min:8',
                            'max:12',            // must be at least 10 characters in length
                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                            'regex:/[A-Z]/',      // must contain at least one uppercase letter
                            'regex:/[0-9]/',      // must contain at least one digit
                            'regex:/[@$!%*#?&]/', // must contain a special character
                            ],
            ],
            [
                'password.min' => 'Kata Laluan wajib di isi sekurang-kurangnya 8 karektor',
                'password.max' => 'Kata Laluan wajib di isi kurang daripada 12 karektor',
                'password.regex' => 'Kata Laluan wajib mengandungi huruf besar, huruf kecil, nombor dan juga simbol',
            ]
        );

        $user = auth()->user();
        $user ->Pswd = bcrypt($request->password);
        $user->save();

        //notify : send email to noordiana.zaharah@gmail.com
        //method 1
        Mail::send('email.update-pwd-email', [
            'Nama'=> $user->Nama,
            'no_kp' => $user->no_kp,
            'Pswd' =>  $request['password'] ],
                        function ($message) {
                                $message->from('noordiana@mohe.gov.my');
                                $message->to('noordiana.zaharah@gmail.com', 'Diana')
                                ->subject('Kemaskini Tukar Katalaluan Baharu');
                            });

                            auth()->logout();

        return redirect()->route('new-login:ui')->with('status','Kata Laluan berjaya di kemaskini.Sila Log Masuk semula.');
        //return redirect()->route('std-profile-password')->with('status','Kata Laluan berjaya di kemaskini');
    }

}
