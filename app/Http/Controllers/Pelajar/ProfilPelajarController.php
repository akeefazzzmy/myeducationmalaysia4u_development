<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Storage;
use File;
use Mail;

class ProfilPelajarController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('pelajar.profil.index', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        //save to db
        // dd($request);
        $user = auth()->user();
        $user->name = $request->nama;
        $user->email = $request->emel;
        $user->no_tel = $request->no_tel;
       // $user->Kod_Status = $request->Status;
        $user->save();

        if($request->hasFile('profile_picture')){
            $filename = 'profile-picture-'.$user->no_kp.'-'.date("Y-m-d").".".$request->profile_picture->getClientOriginalExtension();

            Storage::disk('public')->put($filename, File::get($request->profile_picture));

            $user->image_file = $filename;
            $user->save();
        }

        // return redirect()->to('pengurusan/my-profile')->with('status','Maklumat Profil berjaya di kemaskini');
        return redirect()->route('pelajar-profil:index')->with(
                    [
                        'alert-type'=>'alert-success',
                        'alert-message'=>'Profil Saya sudah berjaya dikemaskini'
                    ]);
    }
    public function myProfilePassword()
    {
        // return view ('pengurusan.my-profile-password');
        return view('pelajar.profil.password-index');
    }
    public function updatePassword(Request $request)
    {
        // $this->validate(
        //     $request,
        //     ['password' => ['required',
        //                     'string',
        //                     'min:8',
        //                     'max:12',            // must be at least 10 characters in length
        //                     'regex:/[a-z]/',      // must contain at least one lowercase letter
        //                     'regex:/[A-Z]/',      // must contain at least one uppercase letter
        //                     'regex:/[0-9]/',      // must contain at least one digit
        //                     'regex:/[@$!%*#?&]/', // must contain a special character
        //                     ],
        //     ],
        //     [
        //         'password.min' => 'Kata Laluan wajib di isi sekurang-kurangnya 8 karektor',
        //         'password.max' => 'Kata Laluan wajib di isi kurang daripada 12 karektor',
        //         'password.regex' => 'Kata Laluan wajib mengandungi huruf besar, huruf kecil, nombor dan juga simbol',
        //     ]
        // );

        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();

        //notify : send email to noordiana.zaharah@gmail.com
        //method 1
        Mail::send('email.update-pwd-email', [
            'nama'=> $user->name,
            'no_kp' => $user->no_kp,
            'password' =>  $request['password'] ],
                        function ($message) {
                                $message->from('noordiana@mohe.gov.my');
                                $message->to('noordiana.zaharah@gmail.com', 'Diana')
                                ->subject('Kemaskini Tukar Katalaluan Baharu');
                            });

                            // auth()->logout();

        return redirect()->route('pelajar-dashboard:dashboard')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Kata Laluan sudah berjaya dikemaskini'
            ]);
    }
}
