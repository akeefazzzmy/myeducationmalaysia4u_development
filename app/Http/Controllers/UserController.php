<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        //return to view with users
        return view('user.index',compact('users'));
    }

    public function show(User $user)
    {
        //resources/views/user/show.blade.php
        return view('user.show',compact('user'));
    }
}
