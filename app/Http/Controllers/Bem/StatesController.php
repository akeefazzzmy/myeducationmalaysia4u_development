<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\States;
use App\Models\Negara;

class StatesController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $states = States::where('kod_states', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        // ->orWhere('negara_id', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $states = States::paginate(10);
        }
        
        return view('bem.states.index', compact('states'));
    }
    public function create()
    {
        $senaraiNegara = Negara::orderBy('keterangan')->get();
        return view('bem.states.create', compact('senaraiNegara'));
    }
    public function store(Request $request)
    {
        $states = new States();

        $states->kod_states = $request->kod;
        $states->keterangan = $request->nama;
        $states->negara_id = $request->negara;
        $states->save();

        return redirect()->route('bem-states:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'States sudah berjaya ditambah'
            ]
        );
    }
    public function show(States $states)
    {
        return view('bem.states.show', compact('states'));
    }
    public function edit(States $states)
    {
        $senaraiNegara = Negara::get();
        return view('bem.states.edit', compact('states', 'senaraiNegara'));
    }
    public function update(States $states, Request $request)
    {
        $states->kod_states = $request->kod;
        $states->keterangan = $request->nama;
        $states->negara_id = $request->negara;
        $states->save();

        return redirect()->route('bem-states:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'States sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(States $states)
    {        
        $states->delete();

        return redirect()->route('bem-states:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'States sudah berjaya dihapuskan'
        ]);
    }
}
