<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Agama;

class AgamaController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $senaraiAgama = Agama::where('kod_agama', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $senaraiAgama = Agama::paginate(10);
        }

        // $senaraiAgama = Agama::paginate(10);
        // dd($senaraiAgama);
        return view('bem.agama.index', compact('senaraiAgama'));
    }
    public function create()
    {
        return view('bem.agama.create');
    }
    public function store(Request $request)
    {
        $agama = new Agama();

        $agama->kod_agama = $request->kod;
        $agama->keterangan = $request->nama;
        $agama->save();

        return redirect()->route('bem-agama:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Agama sudah berjaya ditambah'
            ]
        );
    }
    public function show(Agama $agama)
    {
        return view('bem.agama.show', compact('agama'));
    }
    public function edit(Agama $agama)
    {
        return view('bem.agama.edit', compact('agama'));
    }
    public function update(Agama $agama, Request $request)
    {
        $agama->kod_agama = $request->kod;
        $agama->keterangan = $request->nama;
        $agama->save();

        return redirect()->route('bem-agama:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Agama sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Agama $agama)
    {        
        $agama->delete();

        return redirect()->route('bem-agama:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Agama sudah berjaya dihapuskan'
        ]);
    }
}
