<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Storage;
use File;
use Mail;

class MyProfileController extends Controller
{
    //
    public function myProfile()
    {
        // $user = Auth::user();
        $user = auth()->user();
        // dd($user);

        return view('bem.myprofile.myProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request);
        $user = auth()->user();
        $user->name = $request->nama;
        $user->email = $request->emel;
        $user->no_tel = $request->no_tel;
       // $user->Kod_Status = $request->Status;
        $user->save();

        if($request->hasFile('profile_picture')){
            // $filename = 'profile-picture-'.$user->no_kp.'-'.date("Y-m-d").".".$request->profile_picture->getClientOriginalExtension();
            $filename = 'profile-picture-'.$user->no_kp.'-'.date("Y-m-d").".".$request->profile_picture->getClientOriginalExtension();

            Storage::disk('public')->put($filename, File::get($request->profile_picture));

            $user->image_file = $filename;
            $user->save();
        }

        // return redirect()->to('pengurusan/my-profile')->with('status','Maklumat Profil berjaya di kemaskini');
        return redirect()->route('bem-my-profile')->with(
                    [
                        'alert-type'=>'alert-success',
                        'alert-message'=>'Profil Saya sudah berjaya dikemaskini'
                    ]);
    }

    public function myProfilePassword()
    {
        // return view ('pengurusan.my-profile-password');
        return view('bem.myprofile.myProfile-password');
    }

    public function updatePassword(Request $request)
    {
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

        return redirect()->route('bem-dashboard:dashboard')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Kata Laluan sudah berjaya dikemaskini'
            ]);
    }
}
