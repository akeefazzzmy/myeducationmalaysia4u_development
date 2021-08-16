<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StatusVaksinasi;
use DataTables;

class VaksinasiStatusController extends Controller
{
    //
    // public function index()
    // {
    //     // dd('masuk');
    //     return view('admin.vaksinasi.status.index');
    // }

    public function create()
    {
        // dd('masuk createeeeee');
        return view('admin.vaksinasi.status.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $statusVaksinasi = new StatusVaksinasi();

        $statusVaksinasi->keterangan = $request->statusVaksin;
        $statusVaksinasi->no_kp_wujud = $request->kpPewujud;
        $statusVaksinasi->no_kp_kemaskini = $request->kpPewujud;
        $statusVaksinasi->save();

        return redirect()->route('admin-vaksinasi:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Status Vaksinasi ('.$statusVaksinasi->keterangan.') berjaya diwujudkan'
            ]
        );
    }

    public function edit(StatusVaksinasi $statusVaksinasi)
    {
        // dd($statusVaksinasi);
        // return view('admin.negara.edit', compact('negara'));        
        return view('admin.vaksinasi.status.edit', compact('statusVaksinasi'));
    }

    public function update(StatusVaksinasi $statusVaksinasi, Request $request)
    {
        // dd($request);
        $user = auth()->user();

        $statusVaksinasi->keterangan = $request->status;
        $statusVaksinasi->no_kp_kemaskini = $user->no_kp;
        // $negara->no_kp_kemaskini = $user->no_kp;
        $statusVaksinasi->save();

        return redirect()->route('admin-vaksinasi:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Rekod status vaksinasi ('.$statusVaksinasi->keterangan.') berjaya dikemaskini'
            ]);
    }

    public function destroy(StatusVaksinasi $statusVaksinasi)
    {
        // $this->authorize('delete', $training);
        
        $statusVaksinasi->delete();

        return redirect()->route('admin-vaksinasi:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Rekod status vaksinasi ('.$statusVaksinasi->keterangan.') berjaya dihapuskan'
        ]);
    }

    public function getVaksinasiStatus(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = StatusVaksinasi::latest()->get();
            $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) use($hapusMessage)
                {
                    $actionBtn =
                    '<a href="/admin/vaksinasi-status/edit/'.$row->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="/admin/vaksinasi-status/delete/'.$row->id.'" onclick="return confirm('."'$hapusMessage'".')" class="btn btn-danger">Hapus</a>';
                    // <a href='/admin/negara/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
