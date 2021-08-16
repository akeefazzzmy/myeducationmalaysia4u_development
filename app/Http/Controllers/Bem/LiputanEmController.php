<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\LiputanEm;
use App\Models\Em;
use App\Models\Negara;

class LiputanEmController extends Controller
{
    //
    public function index(Request $request)
    {
        $senaraiEM_search = Em::get();
        // $senaraiNegara_search = Negara::get();
        // return view('bem.liputanem.index', compact('senaraiEM'));

        if($request->EmSearch)
        {
            //perform search
            $senaraiEM = Em::where('keterangan', 'LIKE', '%'.$request->EmSearch.'%')
                        // ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        // elseif($request->negaraSearch)
        // {
        //     // dd($request->negaraSearch);
        //     $negaraLiputanEm = LiputanEm::where('negara_id', 'LIKE', '%'.$request->negaraSearch.'%')
        //                 // ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
        //                 ->paginate(5)
        //                 ->withQueryString();
        //     // dd($negaraLiputanEm);
        // }
        else
        {
            $senaraiEM = Em::paginate(5);
        }

        //show on views resources/views/bem/hubungan/index.blade.php
        return view('bem.liputanem.index', compact('senaraiEM_search', 'senaraiEM'));
    }
    public function create()
    {
        $senaraiEm = Em::get();
        $senaraiNegara = Negara::get();
        return view('bem.liputanem.create', compact(['senaraiEm', 'senaraiNegara']));
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        
        $liputanEm = new LiputanEm();

        $liputanEm->em_id = $request->em;
        $liputanEm->negara_id = $request->negara;
        $liputanEm->no_kp_wujud = $user->no_kp;
        $liputanEm->no_kp_kemaskini = $user->no_kp;
        $liputanEm->save();

        return redirect()->route('bem-liputanEm:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Negara '."{$liputanEm->negara->keterangan}".' sudah didaftarkan di bawah liputan '."{$liputanEm->em->keterangan}"
            ]
        );
    }
    public function show($em)
    {
        // dd($em);
        $namaEM = Em::where('id', $em)->first();
        $senaraiNegaraLiputanEm = LiputanEm::where('em_id', $em)->get();
        // dd($senaraiNegaraLiputanEm);
        return view('bem.liputanem.show', compact('namaEM', 'senaraiNegaraLiputanEm'));
    }
    // public function edit(LiputanEm $em)
    // {
    //     // dd($em);
    //     $senaraiEm = Em::get();
    //     return view('bem.liputanem.edit', compact('senaraiEm'));
    // }
    public function destroy(LiputanEm $liputanEmID, $emID)
    {
        // dd($emID);
        $liputanEmID->delete();

        // $negara = LiputanEm::where('negara_id', $liputan)->first();
        // dd($negara);
        // $this->authorize('delete', $training);

        return redirect()->route('bem-liputanEm:show', $emID)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Liputan EM sudah berjaya dihapuskan'
        ]);
    }
}
