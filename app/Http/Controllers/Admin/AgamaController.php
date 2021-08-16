<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Agama;
use DataTables;

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
        return view('admin.agama.index', compact('senaraiAgama'));
    }
    public function create()
    {
        return view('admin.agama.create');
    }
    public function store(Request $request)
    {
        $agama = new Agama();

        $agama->kod_agama = $request->kod;
        $agama->keterangan = $request->nama;
        $agama->save();

        return redirect()->route('admin-agama:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Agama sudah berjaya ditambah'
            ]
        );
    }
    public function show(Agama $agama)
    {
        return view('admin.agama.show', compact('agama'));
    }
    public function edit(Agama $agama)
    {
        return view('admin.agama.edit', compact('agama'));
    }
    public function update(Agama $agama, Request $request)
    {
        $agama->kod_agama = $request->kod;
        $agama->keterangan = $request->nama;
        $agama->save();

        return redirect()->route('admin-agama:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Agama sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Agama $agama)
    {        
        $agama->delete();

        return redirect()->route('admin-agama:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Agama sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getAgama(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Agama::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/agama/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/agama/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
