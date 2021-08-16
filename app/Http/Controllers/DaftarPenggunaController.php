<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
//Use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class DaftarPenggunaController extends Controller
{
    //
    public function registerStudentInterface()
    {
        //  return to view with new login ui
        //resources/views/new/registerStudent.blade.php
        return view('new.registerStudent');
    }

     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nokp' => ['required', 'int', 'min:12','max:12'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8','max:12', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     protected function store(array $data)
    {
        return User::create([
            'KodLogin' => 'STD',
            'NamaPegMSD' => $data['name'],
            'IDLogin' => $data['nokp'],
            'email' => $data['email'],
            'PwdNegara' => Hash::make($data['password']),
        ]);
    }


}
