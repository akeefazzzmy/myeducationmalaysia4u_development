<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view('bem.dashboard');
    }
}
