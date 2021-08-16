<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bidang;
use DataTables;

class BidangPengajianController extends Controller
{
    //
    public function index()
    {
        $senaraiBidang = Bidang::get();

        return view('admin.bidangpengajian.index', compact('senaraiBidang'));
    }
    public function create()
    {
        return view('admin.bidangpengajian.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $user = auth()->user();
        $bidang = new Bidang();

        $bidang->kod_bidang = $request->kod;
        $bidang->nama_bidang = $request->nama;
        $bidang->narrow_field = $request->narrow;
        $bidang->broad_field = $request->broad;
        $bidang->save();

        return redirect()->route('admin-bidangpengajian:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Rekod bidang "'.$bidang->nama_bidang.'" ('.$bidang->kod_bidang.') berjaya diwujudkan'
            ]
        );
    }
    public function show(Bidang $bidang)
    {
        // dd($bidang);
        return view('admin.bidangpengajian.show', compact('bidang'));
    }
    public function edit(Bidang $bidang)
    {
        return view('admin.bidangpengajian.edit', compact('bidang'));
    }
    public function update(Bidang $bidang, Request $request)
    {
        // dd($request);
        $user = auth()->user();

        $bidang->kod_bidang = $request->kod;
        $bidang->nama_bidang = $request->nama;
        $bidang->narrow_field = $request->narrow;
        $bidang->broad_field = $request->broad;
        $bidang->save();

        return redirect()->route('admin-bidangpengajian:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Rekod negara "'.$bidang->nama_bidang.'" ('.$bidang->kod_bidang.') berjaya dikemaskini'
            ]);
    }
    public function destroy(Bidang $bidang)
    {
        // $this->authorize('delete', $training);
        
        $bidang->delete();

        return redirect()->route('admin-bidangpengajian:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=> 'Rekod negara "'.$bidang->nama_bidang.'" ('.$bidang->kod_bidang.') berjaya dihapuskan'
        ]);
    }    

    // TRY DATATABLE YAJRA
    public function getBidangPengajian(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Bidang::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/bidangpengajian/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/bidangpengajian/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/bidangpengajian/show/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
