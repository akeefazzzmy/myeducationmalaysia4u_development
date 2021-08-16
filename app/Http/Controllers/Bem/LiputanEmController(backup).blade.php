<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LiputanEm;
use App\Models\Em;
use App\Models\Negara;

class LiputanEmController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->search != null)
        {
            //perform search
            $liputanEm = LiputanEm::where('em_id', 'LIKE', '%'.$request->search.'%')
                        // ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
            $senaraiEM = Em::get();
        }
        else
        {
            // $senaraiNegara = Negara::paginate(10);
            $senaraiEM = Em::get();
            $liputanEm = LiputanEm::get();
        }
        
        return view('bem.liputanem.index', compact('senaraiEM', 'liputanEm'));
    }
    public function create()
    {
        $senaraiEm = Em::get();
        $senaraiNegara = Negara::get();
        return view('bem.liputanem.create', compact(['senaraiEm', 'senaraiNegara']));
    }
    public function store(Request $request)
    {
        $liputanEm = new LiputanEm();

        $liputanEm->em_id = $request->em;
        $liputanEm->negara_id = $request->negara;
        $liputanEm->save();

        return redirect()->route('bem-liputanEm:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Liputan Education Malaysia sudah berjaya ditambah'
            ]
        );
    }
    public function show(LiputanEm $liputan)
    {
        return view('bem.liputanem.show', compact('liputan'));
    }
    public function edit(LiputanEm $liputan)
    {
        $senaraiEm = Em::get();
        return view('bem.liputanem.edit', compact(['liputan', 'senaraiEm']));
    }
    public function update(LiputanEm $liputan, Request $request)
    {
        $liputan->negara_id = $request->negara;
        $liputan->em_id = $request->em;
        $liputan->save();

        return redirect()->route('bem-liputanEm:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Liputan Education Malaysia sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(LiputanEm $liputan)
    {        
        $liputan->delete();

        return redirect()->route('bem-liputanEm:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Liputan Education Malaysia sudah berjaya dihapuskan'
        ]);
    }
}
