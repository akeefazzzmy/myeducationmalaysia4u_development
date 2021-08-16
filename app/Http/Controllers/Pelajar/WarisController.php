<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Hubungan;
use App\Models\Waris;
use DataTables;

class WarisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user);

        return view('pelajar.waris.index', compact('user'));
    }
    public function create()
    {
        $user = Auth::user();
        $senaraiHubungan = Hubungan::get();

        return view('pelajar.waris.create', compact('user', 'senaraiHubungan'));
    }
    public function store(Request $request)
    {
        $waris = new Waris();

        $waris->profil_pelajar_id = $request->profilPelajarID;
        $waris->no_kp_wujud = $request->kpPewujud;
        $waris->no_kp_kemaskini = $request->kpKemaskini;
        $waris->hubungan_id = $request->hubungan;
        $waris->no_kp = $request->no_kp;
        $waris->nama = $request->nama;
        $waris->alamat = $request->alamatRumah;
        $waris->bandar = $request->bandar;
        $waris->poskod = $request->poskod;
        $waris->no_tel = $request->no_tel;
        $waris->save();

        return redirect()->route('pelajar-waris:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Waris sudah berjaya ditambah'
            ]
        );
    }
    public function show(Waris $waris)
    {
        return view('pelajar.waris.show', compact('waris'));
    }
    public function edit(Waris $waris)
    {
        $user = auth()->user();
        // dd($user);

        $senaraiHubungan = Hubungan::get();
        return view('pelajar.waris.edit', compact('user', 'senaraiHubungan', 'waris'));
    }
    public function update(Waris $waris, Request $request)
    {
        $waris->profil_pelajar_id = $request->profilPelajarID;
        $waris->no_kp_kemaskini = $request->kpKemaskini;
        $waris->hubungan_id = $request->hubungan;
        $waris->no_kp = $request->no_kp;
        $waris->nama = $request->nama;
        $waris->alamat = $request->alamatRumah;
        $waris->bandar = $request->bandar;
        $waris->poskod = $request->poskod;
        $waris->no_tel = $request->no_tel;
        $waris->save();

        return redirect()->route('pelajar-waris:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Waris sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(Waris $waris)
    {
        // $this->authorize('delete', $training);
        
        $waris->delete();

        return redirect()->route('pelajar-waris:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Waris sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getWaris(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $user = auth()->user();
            $profilPelajarId = $user->profil_pelajar->id;
            $message = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";

            $data = Waris::where('profil_pelajar_id', $profilPelajarId)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('hubungan', function($row)
                {
                    $columnHubungan = $row->hubungan->keterangan;                 
                    return $columnHubungan;
                })
                ->addColumn('action', function($row) use ($message)
                {
                    $actionBtn =
                    '<a href="/pelajar/waris/edit/'.$row->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="/pelajar/waris/delete/'.$row->id.'" onclick="return confirm('."'$message'".');" class="btn btn-danger">Hapus</a>';
                    // <a href='/pelajar/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
