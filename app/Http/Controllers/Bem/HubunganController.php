<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hubungan;

class HubunganController extends Controller
{
    //
    public function index(Request $request)
    {
        // $senaraiHubungan = Hubungan::get();
        // return view('bem.hubungan.index', compact('senaraiHubungan'));         

        if($request->search != null)
        {
            //perform search
            $senaraiHubungan = Hubungan::where('kod_hubungan', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $senaraiHubungan = Hubungan::paginate(10);
        }

        //show on views resources/views/bem/hubungan/index.blade.php
        return view('bem.hubungan.index', compact('senaraiHubungan'));
    }
    public function create()
    {
        return view('bem.hubungan.create');
    }
    public function store(Request $request)
    {
        $hubungan = new Hubungan();

        $hubungan->kod_hubungan = $request->kod;
        $hubungan->keterangan = $request->nama;
        $hubungan->save();

        return redirect()->route('bem-hubungan:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Hubungan sudah berjaya ditambah'
            ]
        );
    }
    public function show(Hubungan $hubungan)
    {
        return view('bem.hubungan.show', compact('hubungan'));
    }
    public function edit(Hubungan $hubungan)
    {
        return view('bem.hubungan.edit', compact('hubungan'));
    }
    public function update(Hubungan $hubungan, Request $request)
    {
        $hubungan->kod_hubungan = $request->kod;
        $hubungan->keterangan = $request->nama;
        $hubungan->save();

        return redirect()->route('bem-hubungan:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Hubungan sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Hubungan $hubungan)
    {        
        $hubungan->delete();

        return redirect()->route('bem-hubungan:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Hubungan sudah berjaya dihapuskan'
        ]);
    }
}
