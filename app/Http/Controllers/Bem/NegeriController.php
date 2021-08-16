<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Negeri;

class NegeriController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $senaraiNegeri = Negeri::where('kod_negeri', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $senaraiNegeri = Negeri::paginate(10);
        }
        
        return view('bem.negeri.index', compact('senaraiNegeri'));
    }
    public function create()
    {
        return view('bem.negeri.create');
    }
    public function store(Request $request)
    {
        $negeri = new Negeri();

        $negeri->kod_negeri = $request->kod;
        $negeri->keterangan = $request->nama;
        $negeri->save();

        return redirect()->route('bem-negeri:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Negeri sudah berjaya ditambah'
            ]
        );
    }
    public function show(Negeri $negeri)
    {
        return view('bem.negeri.show', compact('negeri'));
    }
    public function edit(Negeri $negeri)
    {
        return view('bem.negeri.edit', compact('negeri'));
    }
    public function update(Negeri $negeri, Request $request)
    {
        $negeri->kod_negeri = $request->kod;
        $negeri->keterangan = $request->nama;
        $negeri->save();

        return redirect()->route('bem-negeri:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Negeri sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Negeri $negeri)
    {        
        $negeri->delete();

        return redirect()->route('bem-negeri:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Negeri sudah berjaya dihapuskan'
        ]);
    }
}
