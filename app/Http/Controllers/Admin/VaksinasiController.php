<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VaksinasiController extends Controller
{
    //
    public function index()
    {
        // dd('masuk');
        return view('admin.vaksinasi.index');
    }
}
