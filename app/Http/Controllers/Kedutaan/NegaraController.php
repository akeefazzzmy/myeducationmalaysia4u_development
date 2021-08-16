<?php

namespace App\Http\Controllers\Kedutaan;

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
        
        return view('kedutaan.negara.index', compact('senaraiNegara'));
    }

    public function show(Negara $negara)
    {
        return view('kedutaan.negara.show', compact('negara'));
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
                    // $actionBtn =
                    // "<a href='/em/negara/$row->id' class='btn btn-primary'>Papar</a>
                    // <a href='/em/negara/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    // <a href='/em/negara/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";

                    $actionBtn =
                    "<a href='/kedutaan/negara/$row->id' class='btn btn-primary'>Papar</a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
