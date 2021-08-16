<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisVaksin;
use DataTables;

class VaksinasiJenisController extends Controller
{
    //
    public function create()
    {
        return view('admin.vaksinasi.jenis.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $jenisVaksinasi = new JenisVaksin();

        $jenisVaksinasi->nama_vaksin = $request->jenisVaksin;
        $jenisVaksinasi->no_kp_wujud = $request->kpPewujud;
        $jenisVaksinasi->no_kp_kemaskini = $request->kpPewujud;
        $jenisVaksinasi->save();

        return redirect()->route('admin-vaksinasi:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Jenis Vaksin ('.$jenisVaksinasi->nama_vaksin.') berjaya diwujudkan'
            ]
        );
    }

    public function edit(JenisVaksin $jenisVaksinasi)
    {
        // dd($statusVaksinasi);
        // return view('admin.negara.edit', compact('negara'));        
        return view('admin.vaksinasi.jenis.edit', compact('jenisVaksinasi'));
    }

    public function update(JenisVaksin $jenisVaksinasi, Request $request)
    {
        // dd($request);
        $user = auth()->user();

        $jenisVaksinasi->nama_vaksin = $request->jenis;
        $jenisVaksinasi->no_kp_kemaskini = $user->no_kp;
        $jenisVaksinasi->save();

        return redirect()->route('admin-vaksinasi:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Rekod jenis vaksin ('.$jenisVaksinasi->nama_vaksin.') berjaya dikemaskini'
            ]);
    }

    public function destroy(JenisVaksin $jenisVaksinasi)
    {        
        $jenisVaksinasi->delete();

        return redirect()->route('admin-vaksinasi:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Rekod jenis vaksin ('.$jenisVaksinasi->nama_vaksin.') berjaya dihapuskan'
        ]);
    }

    public function getVaksinasiJenis(Request $request)
    {
        if ($request->ajax())
        {
            $data = JenisVaksin::latest()->get();
            $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) use($hapusMessage)
                {
                    $actionBtn =
                    '<a href="/admin/vaksinasi-jenis/edit/'.$row->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="/admin/vaksinasi-jenis/delete/'.$row->id.'" onclick="return confirm('."'$hapusMessage'".')" class="btn btn-danger">Hapus</a>';
                    // <a href='/admin/negara/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
