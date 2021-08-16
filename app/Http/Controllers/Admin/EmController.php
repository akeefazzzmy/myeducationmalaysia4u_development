<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Em;
use App\Models\LiputanEm;
use App\Models\Negara;
use DataTables; 

class EmController extends Controller
{
    //

    public function index(Request $request)
    {
        // $ems = Em::get();
        // return view('admin.em.index', compact('ems'));

        if($request->search != null)
        {
            //perform search
            $ems = Em::where('kod_em', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('kod_negara_em', 'LIKE', '%'.$request->search.'%')
                        ->paginate(10)
                        ->withQueryString();
        }
        else
        {
            $ems = Em::paginate(10);
        }

        return view('admin.em.index', compact('ems'));
    }

    public function create()
    {
        $senaraiNegara = Negara::get()->sortBy('kod_negara');
        return view('admin.em.create', compact('senaraiNegara'));
    }
    
    public function store(Request $request)
    {
        $em = new Em();

        $em->kod_em = $request->kod;
        $em->keterangan = $request->nama;
        $em->kod_negara_em = $request->kodNegaraEM;
        $em->alamat = $request->alamat;
        $em->save();

        return redirect()->route('admin-em:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Education Malaysia sudah berjaya ditambah'
            ]
        );

    }
    
    public function show(Request $request, Em $em)
    {
        // dd($em->kod_em);
        $senaraiNegaraLiputanEm = LiputanEm::with('negara')->where('kod_em', $em->kod_em)->get();
        foreach($senaraiNegaraLiputanEm as $liputanEm)
        {
            $kodNegara = $liputanEm->kod_negara;
        }

        if ($request->ajax())
        {
            // $data = LiputanEm::latest()->get();
            $data = LiputanEm::with('negara')->where('kod_em', $em->kod_em)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('kodNegara', function($row)
                {
                    $columnKodNegara = $row->negara->kod_negara ?? ' ';
                    return $columnKodNegara;
                })
                ->addColumn('negara', function($row)
                {
                    $columnNegara = $row->negara->keterangan ?? ' ';
                    return $columnNegara;
                })
                ->addColumn('action', function($row)
                {
                    $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";
                    $actionBtn =
                    '<a href="/admin/em/deleteLiputan/'.$row->id.'" onclick="return confirm('."'$hapusMessage'".');" class="btn btn-danger">Hapus</a>';
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // $maklumatNegaraLiputanEm = Negara::where('kod_negara', $kodNegara)->get();
        // dd($senaraiNegaraLiputanEm);

        // return view('admin.em.show', compact('em', 'senaraiNegaraLiputanEm'));
        return view('admin.em.show', compact('em'));
    }    
    public function edit(Em $em)
    {
        $senaraiNegara = Negara::get();
        return view('admin.em.edit', compact('em', 'senaraiNegara'));
    }
    
    public function update(Em $em, Request $request)
    {
        $em->kod_em = $request->kod;
        $em->keterangan = $request->nama;
        $em->kod_negara_em = $request->kodNegaraEM;
        $em->alamat = $request->alamatEm;
        $em->save();

        return redirect()->route('admin-em:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Maklumat '.$em->keterangan.' ('.$em->kod_em.') sudah berjaya dikemaskini'
            ]);
    }
    
    public function destroy(Em $em)
    {
        // $this->authorize('delete', $training);
        
        $em->delete();

        return redirect()->route('admin-em:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Educational Malaysia sudah berjaya dihapuskan'
        ]);
    }

    public function createLiputan(Em $em)
    {
        $senaraiNegara = Negara::orderBy('kod_negara')->get();
        return view('admin.em.show-createliputan', compact('em', 'senaraiNegara'));
    }
    public function storeLiputan(Em $em, Request $request)
    {
        $liputanEm = new LiputanEm();
        $liputanEm->kod_em = $request->kod;
        $liputanEm->kod_negara = $request->negara;
        $liputanEm->save();

        return redirect()->route('admin-em:show', $em)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Negara Liputan sudah berjaya ditambah'
            ]
        );

    }

    public function destroyLiputan(LiputanEM $em)
    {
        // dd($em);
        $tableEm = Em::where('kod_em',$em->kod_em)->first();
        // dd($tableEm->id);
        $em->delete();

        return redirect()->route('admin-em:show', $tableEm->id)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Educational Malaysia sudah berjaya dihapuskan'
        ]);
    }

    //DATATABLE
    public function getEm(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Em::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row)
                {
                    $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";

                    $actionBtn =
                    '<a href="/admin/em/'.$row->id.'" class="btn btn-primary">Papar</a>
                    <a href="/admin/em/edit/'.$row->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="/admin/em/delete/'.$row->id.'" onclick="return confirm('."'$hapusMessage'".');" class="btn btn-danger">Hapus</a>';
                    // <a href='/admin/em/edit/$row->id' class='btn btn-success'>Kemaskini</a> asalnya ada
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // public function getNegaraLiputan(Request $request, Em $em)
    // {
    //     if ($request->ajax())
    //     {
    //         // $data = LiputanEm::latest()->get();
    //         $data = LiputanEm::where('kod_em', $em->kod_em)->latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row)
    //             {
    //                 $actionBtn =
    //                 "<a href='/admin/em/$row->id' class='btn btn-primary'>Papar</a>
    //                 <a href='/admin/em/edit/$row->id' class='btn btn-success'>Kemaskini</a>
    //                 <a href='/admin/em/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    // }
}
