<?php

namespace App\Http\Controllers\Em;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\States;
use App\Models\Negara;
use App\Models\LiputanEm;
use Illuminate\Support\Facades\Auth;
use DataTables; 

class StatesController extends Controller
{
    //
    public function index()
    {
        // $user = auth()->user();
        // $data = LiputanEm::where('em_id', $user->em_id)->latest()->get(); //betul //untukyajradatatable
        // dd($data);

        $states = States::orderBy('keterangan')->get();
        return view('em.states.index', compact('states'));
    }

    public function create()
    {
        $user = auth()->user();
        $senaraiLiputanEM = LiputanEm::where('em_id', $user->em_id)->latest()->get();
        // dd($senaraiLiputanEM);
        // $senaraiStates = States::orderBy('keterangan')->get();
        return view('em.states.create', compact('senaraiLiputanEM'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $tableStates = States::where('negara_id', $request->negara)->orderBy('kod_states', 'desc')->first();
        // dd((int)$tableStates->kod_states+(int)1);
        // dd($kodStates);
        // $autoGenerateKodStates = (int)$tableStates->kod_states+(int)1;
        // dd($autoGenerateKodStates);

        $states = new States();                
        $states->kod_states = '2';
        $states->keterangan = $request->state;
        $states->no_kp_wujud = $user->no_kp;
        $states->no_kp_kemaskini = $user->no_kp;
        $states->negara_id = $request->negara;
        $states->save();

        // return redirect()->route('admin-states:index')->with(
        //     [
        //         'alert-type' => 'alert-primary',
        //         'alert-message' => 'States sudah berjaya ditambah'
        //     ]
        // );

        return redirect()->route('em-states:create')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'States sudah berjaya ditambah'
            ]
        );
    }

    // TRY DATATABLE YAJRA
    public function getStates(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $data = States::latest()->get();
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function($row)
                {
                    $senaraiNegara = Negara::where('id', $row->negara_id)->latest()->get();
                    // dd($negara);

                    foreach($senaraiNegara as $negara)
                    {
                        $columnNegara = "$negara->keterangan";
                    }
                    // $columnNegara = "$senaraiNegara";
                    return $columnNegara;
                })
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/states/$row->id' class='btn btn-primary'>Papar</a>
                    <a href='/admin/states/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/states/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
