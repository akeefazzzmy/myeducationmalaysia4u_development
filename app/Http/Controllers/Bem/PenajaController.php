<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Penaja;

class PenajaController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $senaraiPenaja = Penaja::where('kod_penaja', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('singkatan', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $senaraiPenaja = Penaja::paginate(5);
        }

        return view('bem.penaja.index', compact('senaraiPenaja'));
    }
    public function create()
    {
        return view('bem.penaja.create');
    }
    public function store(Request $request)
    {
        $penaja = new Penaja();

        $penaja->kod_penaja = $request->kod;
        $penaja->singkatan = $request->singkatan;
        $penaja->keterangan = $request->nama;
        $penaja->save();

        return redirect()->route('bem-penaja:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Penaja '."{$penaja->singkatan}".' sudah berjaya didaftarkan'
            ]
        );

    }
    public function show(Penaja $penaja)
    {
        return view('bem.penaja.show', compact('penaja'));
    }
    public function edit(Penaja $penaja)
    {
        return view('bem.penaja.edit', compact('penaja'));
    }
    public function update(Penaja $penaja, Request $request)
    {
        $penaja->kod_penaja = $request->kod;
        $penaja->singkatan = $request->singkatan;
        $penaja->keterangan = $request->nama;        
        $penaja->save();

        return redirect()->route('bem-penaja:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Penaja sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Penaja $penaja)
    {        
        $penaja->delete();

        return redirect()->route('bem-penaja:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Penaja sudah berjaya dihapuskan'
        ]);
    }
}
