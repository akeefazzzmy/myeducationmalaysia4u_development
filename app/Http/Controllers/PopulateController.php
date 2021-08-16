<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\States;

class PopulateController extends Controller
{
    //
    public function populateNegaraToState(Request $request)
    {
        // dd($request);
        $states = States::where('kod_negara', $request->negara)->get();
        // dd($states);         
        return $states;
    }
}
