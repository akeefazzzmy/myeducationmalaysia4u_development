<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $user = Auth::user();
        // dd($user);
        // return view('pelajar.dashboard', compact('user'));
        return view('pelajar.dashboard');
    }
}
