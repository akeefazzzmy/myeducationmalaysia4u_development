<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class DaftarPelajarController extends Controller
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
            'nokp' => ['required', 'int', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'nokp' => $data['nokp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
