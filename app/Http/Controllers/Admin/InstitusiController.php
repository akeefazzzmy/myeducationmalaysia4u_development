<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institusi;
use App\Models\Negara;
use App\Models\States;

use DataTables;

class InstitusiController extends Controller
{
    //

    public function index()
    {
        $senaraiInstitusi = Institusi::with('states')->get();
        // dd($senaraiInstitusi[1]);

        return view('admin.institusi.index', compact('senaraiInstitusi'));
    }
    public function create()
    {
        $senaraiNegara = Negara::get();
        $states = States::get();
        return view('admin.institusi.create', compact('senaraiNegara', 'states'));

        // $states = States::get();
        // return view('admin.institusi.create', compact('states'));
        // return view('admin.institusi.create');
    }
    public function store(Request $request)
    {
        // dd($request->state);
        $senaraiInstitusi = Institusi::where('kod_states', $request->state)->orderBy('id', 'desc')->first();
        $autoGenerateKodInstitusi = substr("$senaraiInstitusi->kod_institusi", -2)+(int)1;
        $kod_institusi_baru = substr_replace($senaraiInstitusi->kod_institusi, $autoGenerateKodInstitusi, -2);
        // dd($kod_institusi_baru);
        $institusi = new Institusi();
        $institusi->kod_institusi = $kod_institusi_baru;
        $institusi->keterangan = $request->nama;
        $institusi->kod_states = $request->state;
        // $institusi->states_id = $request->state;
        $institusi->save();

        return redirect()->route('admin-institusi:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Institusi sudah berjaya ditambah'
            ]
        );
    }
    public function show(Institusi $institusi)
    {
        return view('admin.institusi.show', compact('institusi'));
    }
    public function edit(Institusi $institusi)
    {
        $senaraiNegara = Negara::get();
        $states = States::get();
        return view('admin.institusi.edit', compact(['institusi', 'senaraiNegara', 'states']));
    }
    public function update(Institusi $institusi, Request $request)
    {
        // $institusi->kod_institusi = $request->kod;
        // $institusi->keterangan = $request->nama;
        // // $institusi->states_id = $request->state; //asalnya yg ni sebelum tukar column db
        // $institusi->kod_states = $request->state;
        // $institusi->save();

        $institusi->kod_institusi = $request->kod;
        $institusi->keterangan = $request->nama;
        // $institusi->states_id = $request->state; //asalnya yg ni sebelum tukar column db
        // $institusi->kod_states = $request->state;
        $institusi->save();

        return redirect()->route('admin-institusi:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Institusi sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Institusi $institusi)
    {
        // $this->authorize('delete', $training);
        
        $institusi->delete();

        return redirect()->route('admin-institusi:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Institusi sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getInstitusi(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = Institusi::with('states')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function($row)
                {
                    $columnNegara = $row->states->negara->keterangan ??' ';                 
                    return $columnNegara;
                })
                ->addColumn('states', function($row)
                {
                    $columnState = $row->states->keterangan ?? ' ';
                    return $columnState;
                })
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/institusi/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/institusi/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/institusi/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
