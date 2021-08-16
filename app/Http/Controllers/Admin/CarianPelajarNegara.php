<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarianPelajarNegara extends Controller
{
    //
    public function index()
    {
        // dd('masuk');
        return view('admin.carianpelajar.negara.index');
    }
}
