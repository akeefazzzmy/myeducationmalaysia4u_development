<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TahapPengajian;
use DataTables;

class TahapPengajianController extends Controller
{
    //

    public function index()
    {
        $tahapPengajian = TahapPengajian::get();
        return view('admin.tahappengajian.index', compact('tahapPengajian'));
    }
    public function create()
    {
        return view('admin.tahappengajian.create');
    }
    public function store(Request $request)
    {
        dd($request);
        $tahapPengajian = new TahapPengajian();

        $tahapPengajian->kod_tahap = $request->kod;
        $tahapPengajian->keterangan = $request->nama;
        $tahapPengajian->save();

        return redirect()->route('admin-tahappengajian:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Tahap Pengajian sudah berjaya ditambah'
            ]
        );
    }
    public function show(TahapPengajian $tahap)
    {
        return view('admin.tahappengajian.show', compact('tahap'));
    }
    public function edit(TahapPengajian $tahap)
    {
        return view('admin.tahappengajian.edit', compact('tahap'));
    }
    public function update(TahapPengajian $tahap, Request $request)
    {
        $tahap->kod_tahap = $request->kod;
        $tahap->keterangan = $request->nama;
        $tahap->save();

        return redirect()->route('admin-tahappengajian:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Educational Malaysia sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(TahapPengajian $tahap)
    {
        // $this->authorize('delete', $training);
        
        $tahap->delete();

        return redirect()->route('admin-tahappengajian:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Educational Malaysia sudah berjaya dihapuskan'
        ]);
    }

    public function getTahapPengajian(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = TahapPengajian::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/tahappengajian/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/tahappengajian/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/tahappengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
}
