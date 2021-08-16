<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LiputanEm;
use App\Models\Em;
use App\Models\Negara;
use DataTables; 

class LiputanEmController extends Controller
{
    //

    public function index()
    {
        $liputanEm = LiputanEm::get();
        return view('admin.liputanem.index', compact('liputanEm'));
    }
    public function create()
    {
        $senaraiEm = Em::get();
        $senaraiNegara = Negara::get();
        return view('admin.liputanem.create', compact(['senaraiEm', 'senaraiNegara']));
    }
    public function store(Request $request)
    {
        $liputanEm = new LiputanEm();

        $liputanEm->em_id = $request->em;
        $liputanEm->negara_id = $request->negara;
        $liputanEm->save();

        return redirect()->route('admin-liputanEm:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Liputan EM sudah berjaya ditambah'
            ]
        );
    }
    public function show(LiputanEm $liputan)
    {
        return view('admin.liputanem.show', compact('liputan'));
    }
    public function edit(LiputanEm $liputan)
    {
        $senaraiEm = Em::get();
        return view('admin.liputanem.edit', compact(['liputan', 'senaraiEm']));
    }
    public function update(LiputanEm $liputan, Request $request)
    {
        $liputan->negara_id = $request->negara;
        $liputan->em_id = $request->em;
        $liputan->save();

        return redirect()->route('admin-liputanEm:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Liputan EM sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(LiputanEm $liputan)
    {
        // $this->authorize('delete', $training);
        
        $liputan->delete();

        return redirect()->route('admin-liputanEm:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Liputan EM sudah berjaya dihapuskan'
        ]);
    }

    public function getLiputanEm(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = LiputanEm::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function($row)
                {
                    $senaraiNegara = Negara::where('id', $row->negara_id)->latest()->get();
                    foreach($senaraiNegara as $negara)
                    {
                        $columnNegara = "$negara->keterangan";
                    }
                    return $columnNegara;
                })
                ->addColumn('em', function($row)
                {
                    $senaraiEm = Em::where('id', $row->em_id)->latest()->get();
                    foreach($senaraiEm as $em)
                    {
                        $columnEm = "$em->keterangan";
                    }
                    return $columnEm;
                })
                ->addColumn('kod_em', function($row)
                {
                    $senaraiEm = Em::where('id', $row->em_id)->latest()->get();
                    foreach($senaraiEm as $em)
                    {
                        $columnKodEm = "$em->kod_em";
                    }
                    return $columnKodEm;
                })
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/liputanEm/$row->id' class='btn btn-primary'>Papar</a>
                    <a href='/admin/liputanEm/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/liputanEm/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
