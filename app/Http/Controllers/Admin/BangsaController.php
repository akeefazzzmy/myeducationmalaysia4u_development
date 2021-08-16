<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bangsa;
use DataTables;

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
        return view('admin.bangsa.index', compact('senaraiBangsa'));
    }
    public function create()
    {
        return view('admin.bangsa.create');
    }
    public function store(Request $request)
    {
        $bangsa = new Bangsa();

        $bangsa->kod_bangsa = $request->kod;
        $bangsa->keterangan = $request->nama;
        $bangsa->save();

        return redirect()->route('admin-bangsa:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Bangsa sudah berjaya ditambah'
            ]
        );
    }
    public function show(Bangsa $bangsa)
    {
        return view('admin.bangsa.show', compact('bangsa'));
    }
    public function edit(Bangsa $bangsa)
    {
        return view('admin.bangsa.edit', compact('bangsa'));
    }
    public function update(Bangsa $bangsa, Request $request)
    {
        $bangsa->kod_bangsa = $request->kod;
        $bangsa->keterangan = $request->nama;
        $bangsa->save();

        return redirect()->route('admin-bangsa:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Bangsa sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Bangsa $bangsa)
    {
        // $this->authorize('delete', $training);
        
        $bangsa->delete();

        return redirect()->route('admin-bangsa:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Bangsa sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getBangsa(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Bangsa::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/bangsa/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/bangsa/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
