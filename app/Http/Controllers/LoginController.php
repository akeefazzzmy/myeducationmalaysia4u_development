<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Capaian;
// use App\Models\Pelajar;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function loginInterface()
    {
        //  return to view with new login ui
        //resources/views/new/login.blade.php

        $tahapCapaian = Capaian::get();
        return view('new.login', compact('tahapCapaian'));
    }

    public function loginProcess(Request $request)
    {
        $user = User::where('no_kp', $request->username)->where('capaian_id', $request->tahapCapaian)->first();
        // $user = User::where('no_kp', $request->username)->where('kod_capaian', $request->tahapCapaian)->first();
        // dd($user);
        
        //if ada hash password == hash password in db
      if ($user)
      {     //login
        if (Hash::check($request->password, $user->password))
        {
            if($user->capaian_id == '1')
            {
                return redirect()->to('admin/dashboard');                
            }
            // else if($user->capaian_id == '3')
            // {
            //     return redirect()->to('em/dashboard');
            // }
            else if($user->capaian_id == '5')
            {
                return redirect()->to('pelajar/dashboard');
                // return view('home', compact('pelajar'));
            }
            else
            {
                return redirect()->to('new-login')->with('status','Ralat. ID Pengguna tidak sah. Sila hubungi Admin Sistem.');
            }
        }
        else
        {
            return redirect()->to('new-login')->with('status','Ralat. Katalaluan atau ID Pengguna tidak tepat. Sila Log masuk semula.');
        }
    }
        
        return redirect()->to('new-login')->with('status','Ralat. ID Pengguna tidak wujud. Sila daftar pengguna.');
        //else
            //error message, wrong credentials
            //redirect to login page
    }

}
