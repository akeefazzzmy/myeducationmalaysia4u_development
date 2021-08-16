<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bangsa;

class BangsaController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $senaraiBangsa = Bangsa::where('kod_bangsa', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $senaraiBangsa = Bangsa::paginate(10);
        }

        // $senaraiBangsa = Bangsa::paginate(10);
        // dd($senaraiBangsa);
        return view('bem.bangsa.index', compact('senaraiBangsa'));
    }
    public function create()
    {
        return view('bem.bangsa.create');
    }
    public function store(Request $request)
    {
        $bangsa = new Bangsa();

        $bangsa->kod_bangsa = $request->kod;
        $bangsa->keterangan = $request->nama;
        $bangsa->save();

        return redirect()->route('bem-bangsa:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Bangsa sudah berjaya ditambah'
            ]
        );
    }
    public function show(Bangsa $bangsa)
    {
        return view('bem.bangsa.show', compact('bangsa'));
    }
    public function edit(Bangsa $bangsa)
    {
        return view('bem.bangsa.edit', compact('bangsa'));
    }
    public function update(Bangsa $bangsa, Request $request)
    {
        $bangsa->kod_bangsa = $request->kod;
        $bangsa->keterangan = $request->nama;
        $bangsa->save();

        return redirect()->route('bem-bangsa:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Bangsa sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Bangsa $bangsa)
    {
        // $this->authorize('delete', $training);
        
        $bangsa->delete();

        return redirect()->route('bem-bangsa:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Bangsa sudah berjaya dihapuskan'
        ]);
    }
}
