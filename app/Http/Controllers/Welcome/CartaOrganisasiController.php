<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartaOrganisasiController extends Controller
{
    //
    public function index()
    {
        return view('welcome.maklumatkorporat.cartaorganisasi');
    }
}
