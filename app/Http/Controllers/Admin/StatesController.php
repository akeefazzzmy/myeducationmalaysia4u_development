<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\States;
use App\Models\Negara;
use Illuminate\Support\Facades\Auth;
use DataTables; 

class StatesController extends Controller
{
    //

    public function index()
    {
        $senaraiNegara = Negara::get();
        $states = States::get();
        return view('admin.states.index', compact('states', 'senaraiNegara'));
    }
    public function create()
    {
        $senaraiNegara = Negara::orderBy('keterangan')->get();
        return view('admin.states.create', compact('senaraiNegara'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $user = auth()->user();

        $tableStates = States::where('kod_negara', $request->negara)->orderBy('kod_states', 'desc')->first();
        // dd($tableStates);
        $kodStates = $tableStates->kod_states;
        $autoGenerateKodState = substr($kodStates, -1)+(int)1;
        // dd(substr($tableStates->kod_states, -1));
        // dd($autoGenerateKodState);
        
        if($autoGenerateKodState == 1)
        {
            $a = substr($kodStates, -2);

            $kodStateBaru = str_replace($a,"01",$kodStates);
            // dd($kodStateBaru);
        }
        else
        {
            $a = $autoGenerateKodState;
            $plusOne = $autoGenerateKodState+1;
            $kodStateBaru = str_replace($a,$plusOne,$kodStates);
        }
        // dd($autoGenerateKodState);

        $kod_state_baru = substr_replace($tableStates->kod_states, $autoGenerateKodState, -2);
        // dd($kod_state_baru);
        // $autoGenerateKodStates = (int)$tableStates->kod_states+(int)1;
        // dd($autoGenerateKodStates);

        $states = new States();                
        $states->kod_states = $kodStateBaru;
        $states->keterangan = $request->nama;
        $states->kod_negara = $request->negara;
        // $states->negara_id = $request->negara;
        // $states->no_kp_wujud = $user->no_kp;
        // $states->no_kp_kemaskini = $user->no_kp;
        $states->save();

        // return redirect()->route('admin-states:index')->with(
        //     [
        //         'alert-type' => 'alert-primary',
        //         'alert-message' => 'States sudah berjaya ditambah'
        //     ]
        // );

        return redirect()->route('admin-states:create')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'States sudah berjaya ditambah'
            ]
        );
    }
    public function show(States $states)
    {
        return view('admin.states.show', compact('states'));
    }
    public function edit(States $states)
    {
        $senaraiNegara = Negara::orderBy('keterangan', 'ASC')->get();
        return view('admin.states.edit', compact('states', 'senaraiNegara'));
    }
    public function update(States $states, Request $request)
    {
        $states->kod_states = $request->kod;
        $states->keterangan = $request->nama;
        // $states->negara_id = $request->negara;
        $states->kod_negara = $request->negara;
        $states->save();

        return redirect()->route('admin-states:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'States sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(States $states)
    {
        // $this->authorize('delete', $training);
        
        $states->delete();

        return redirect()->route('admin-states:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'States sudah berjaya dihapuskan'
        ]);
    }

    // 
    public function getStates(Request $request)
    {
        //22 06 2021
        //if request semua,semua negara, utk admin
        //if em, show negara liputan sendiri

        // dd($request);
        if ($request->ajax())
        {
            $data = States::get();
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function($row)
                {
                    $columnNegara = $row->negara->keterangan ??' ';                 
                    return $columnNegara;
                })
                ->addColumn('action', function($row)
                {
                    $actionBtn =
                    "<a href='/admin/states/edit/$row->id' class='btn btn-success'>Kemaskini</a>
                    <a href='/admin/states/delete/$row->id' onclick='return confirm(Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?)' class='btn btn-danger'>Hapus</a>";
                    // <a href='/admin/states/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function populateStates(Request $request)
    {
        // dd($request);
        $senaraiStates = States::where('kod_negara', $request->kod_negara)->get();
        // dd($senaraiStates);
        // return view('admin.states.create', compact('senaraiStates'));
        return $senaraiStates;
    }
}
