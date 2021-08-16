<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Negeri;
use DataTables;

class NegeriController extends Controller
{
    //
    public function index()
    {
        $senaraiNegeri = Negeri::get();
        return view('admin.negeri.index', compact('senaraiNegeri'));
    }
    public function create()
    {
        return view('admin.negeri.create');
    }
    public function store(Request $request)
    {
        $negeri = new Negeri();

        $negeri->kod_negeri = $request->kod;
        $negeri->keterangan = $request->nama;
        $negeri->save();

        return redirect()->route('admin-negeri:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Negeri sudah berjaya ditambah'
            ]
        );
    }
    public function show(Negeri $negeri)
    {
        return view('admin.negeri.show', compact('negeri'));
    }
    public function edit(Negeri $negeri)
    {
        return view('admin.negeri.edit', compact('negeri'));
    }
    public function update(Negeri $negeri, Request $request)
    {
        $negeri->kod_negeri = $request->kod;
        $negeri->keterangan = $request->nama;
        $negeri->save();

        return redirect()->route('admin-negeri:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Negeri sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Negeri $negeri)
    {
        // $this->authorize('delete', $training);
        
        $negeri->delete();

        return redirect()->route('admin-negeri:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Negeri sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getNegeri(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Negeri::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/negeri/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/negeri/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/negeri/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
