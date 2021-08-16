<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    //
    public function index()
    {
        // dd("masuk");
        return view('welcome.maklumatkorporat.sejarah');
    }
}
