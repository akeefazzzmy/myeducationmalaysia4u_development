<?php

namespace App\Http\Controllers\Kedutaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view('kedutaan.dashboard');
    }
}
