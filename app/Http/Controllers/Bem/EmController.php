<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Em;

class EmController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $ems = Em::where('kod_em', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('kod_negara_em', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $ems = Em::paginate(5);
        }

        return view('bem.em.index', compact('ems'));
    }
    public function create()
    {
        return view('bem.em.create');
    }
    public function store(Request $request)
    {
        $em = new Em();

        $em->kod_em = $request->kod;
        $em->keterangan = $request->nama;
        $em->kod_negara_em = $request->kodNegaraEM;
        $em->save();

        return redirect()->route('bem-em:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Educational Malaysia sudah berjaya ditambah'
            ]
        );

    }
    public function show(Em $em)
    {
        return view('bem.em.show', compact('em'));
    }
    public function edit(Em $em)
    {
        return view('bem.em.edit', compact('em'));
    }
    public function update(Em $em, Request $request)
    {
        $em->kod_em = $request->kod;
        $em->keterangan = $request->nama;
        $em->kod_negara_em = $request->kodNegaraEM;
        $em->save();

        return redirect()->route('bem-em:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Educational Malaysia sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Em $em)
    {
        // $this->authorize('delete', $training);
        
        $em->delete();

        return redirect()->route('bem-em:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Educational Malaysia sudah berjaya dihapuskan'
        ]);
    }
}
