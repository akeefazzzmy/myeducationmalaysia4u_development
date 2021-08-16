<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StatusPengajian;
use DataTables;

class StatusPengajianController extends Controller
{
    //

    public function index()
    {
        $statuspengajian = StatusPengajian::get();
        return view('admin.statuspengajian.index', compact('statuspengajian'));
    }
    public function create()
    {
        return view('admin.statuspengajian.create');
    }
    public function store(Request $request)
    {
        $statuspengajian = new StatusPengajian();

        $statuspengajian->kod_status = $request->kod;
        $statuspengajian->keterangan = $request->nama;
        $statuspengajian->save();

        return redirect()->route('admin-statuspengajian:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Status Pengajian sudah berjaya ditambah'
            ]
        ); 
    }
    public function show(StatusPengajian $status)
    {
        return view('admin.statuspengajian.show', compact('status'));
    }
    public function edit(StatusPengajian $status)
    {
        return view('admin.statuspengajian.edit', compact('status'));
    }
    public function update(StatusPengajian $status, Request $request)
    {
        $status->kod_status = $request->kod;
        $status->keterangan = $request->nama;
        $status->save();

        return redirect()->route('admin-statuspengajian:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Status Pengajian sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(StatusPengajian $status)
    {
        // $this->authorize('delete', $training);
        
        $status->delete();

        return redirect()->route('admin-statuspengajian:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Status Pengajian sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getStatusPengajian(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = StatusPengajian::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/statuspengajian/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/statuspengajian/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
