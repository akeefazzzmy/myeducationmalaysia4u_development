<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Penaja;
use DataTables;

class PenajaController extends Controller
{
    //

    public function index(Request $request)
    {
        // $senaraiPenaja = Penaja::get();
        // return view('admin.penaja.index', compact('senaraiPenaja'));

        if($request->search != null)
        {
            //perform search
            $senaraiPenaja = Penaja::where('kod_penaja', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('singkatan', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(10)
                        ->withQueryString();
        }
        else
        {
            $senaraiPenaja = Penaja::paginate(5);
        }

        return view('admin.penaja.index', compact('senaraiPenaja'));
    }
    public function create()
    {
        return view('admin.penaja.create');
    }
    public function store(Request $request)
    {
        $penaja = new Penaja();

        $penaja->kod_penaja = $request->kod;
        $penaja->singkatan = $request->singkatan;
        $penaja->keterangan = $request->nama;
        $penaja->save();

        return redirect()->route('admin-penaja:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Penaja sudah berjaya ditambah'
            ]
        );
    }
    public function show(Penaja $penaja)
    {
        return view('admin.penaja.show', compact('penaja'));
    }
    public function edit(Penaja $penaja)
    {
        return view('admin.penaja.edit', compact('penaja'));
    }
    public function update(Penaja $penaja, Request $request)
    {
        $penaja->kod_penaja = $request->kod;
        $penaja->singkatan = $request->singkatan;
        $penaja->keterangan = $request->nama;
        $penaja->save();

        return redirect()->route('admin-penaja:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Penaja sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Penaja $penaja)
    {
        // $this->authorize('delete', $training);
        
        $penaja->delete();

        return redirect()->route('admin-penaja:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Penaja sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getPenaja(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Penaja::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/penaja/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/penaja/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
