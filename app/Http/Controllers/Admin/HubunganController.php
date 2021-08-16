<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hubungan;
use DataTables;

class HubunganController extends Controller
{
    //

    public function index(Request $request)
    {
        // $senaraiHubungan = Hubungan::get();
        // return view('admin.hubungan.index', compact('senaraiHubungan'));         

        if($request->search != null)
        {
            //perform search
            $senaraiHubungan = Hubungan::where('kod_hubungan', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->paginate(5)
                        ->withQueryString();
        }
        else
        {
            $senaraiHubungan = Hubungan::paginate(10);
        }

        //show on views resources/views/admin/hubungan/index.blade.php
        return view('admin.hubungan.index', compact('senaraiHubungan'));
    }
    public function create()
    {
        return view('admin.hubungan.create');
    }
    public function store(Request $request)
    {
        $hubungan = new Hubungan();

        $hubungan->kod_hubungan = $request->kod;
        $hubungan->keterangan = $request->nama;
        $hubungan->save();

        return redirect()->route('admin-hubungan:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Hubungan sudah berjaya ditambah'
            ]
        );
    }
    public function show(Hubungan $hubungan)
    {
        return view('admin.hubungan.show', compact('hubungan'));
    }
    public function edit(Hubungan $hubungan)
    {
        return view('admin.hubungan.edit', compact('hubungan'));
    }
    public function update(Hubungan $hubungan, Request $request)
    {
        $hubungan->kod_hubungan = $request->kod;
        $hubungan->keterangan = $request->nama;
        $hubungan->save();

        return redirect()->route('admin-hubungan:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Hubungan sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Hubungan $hubungan)
    {
        // $this->authorize('delete', $training);
        
        $hubungan->delete();

        return redirect()->route('admin-hubungan:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Hubungan sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getHubungan(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Hubungan::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/hubungan/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/hubungan/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
