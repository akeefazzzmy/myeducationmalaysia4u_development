<?php

namespace App\Http\Controllers\Bem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Negara;
use Illuminate\Support\Facades\Auth;

// yajra
use DataTables; 

class NegaraController extends Controller
{
    //
    public function index(Request $request)
    {
        // $senaraiNegara = Negara::get();
        // return view('bem.negara.index', compact('senaraiNegara'));

        if($request->search != null)
        {
            //perform search
            $senaraiNegara = Negara::where('kod_negara', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $senaraiNegara = Negara::paginate(10);
        }
        
        return view('bem.negara.index', compact('senaraiNegara'));
    }
    public function create()
    {
        return view('bem.negara.create');
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        $negara = new Negara();

        $negara->kod_negara = $request->kod;
        $negara->keterangan = $request->nama;
        $negara->no_kp_wujud = $user->no_kp;
        $negara->no_kp_kemaskini = $user->no_kp;
        $negara->save();

        return redirect()->route('bem-negara:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Rekod negara "'.$negara->keterangan.'" ('.$negara->kod_negara.') berjaya diwujudkan'
            ]
        );
    }
    public function show(Negara $negara)
    {
        return view('bem.negara.show', compact('negara'));
    }
    public function edit(Negara $negara)
    {
        return view('bem.negara.edit', compact('negara'));
    }
    public function update(Negara $negara, Request $request)
    {
        $user = auth()->user();

        $negara->kod_negara = $request->kod;
        $negara->keterangan = $request->nama;
        $negara->no_kp_kemaskini = $user->no_kp;
        $negara->save();

        return redirect()->route('bem-negara:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=> 'Rekod negara "'.$negara->keterangan.'" ('.$negara->kod_negara.') berjaya dikemaskini'
            ]);
    }
    public function destroy(Negara $negara)
    {
        // $this->authorize('delete', $training);
        
        $negara->delete();

        return redirect()->route('bem-negara:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Rekod negara "'.$negara->keterangan.'" ('.$negara->kod_negara.') berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getNegara(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Negara::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/bem/negara/$row->id' class='btn btn-primary'>Papar</a>
                    <a href='/bem/negara/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/bem/negara/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
