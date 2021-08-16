<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\StatusVaksinasi;
use App\Models\JenisVaksin;
use App\Models\VaksinasiPelajar;
use DataTables;

class VaksinasiPelajarController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        return view('pelajar.vaksinasi.index', compact('user'));
    }

    public function create()
    {
        $senaraiStatusVaksinasi = StatusVaksinasi::get();
        $senaraiJenisVaksin = JenisVaksin::get();
        return view('pelajar.vaksinasi.create', compact('senaraiStatusVaksinasi', 'senaraiJenisVaksin'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $maklumatVaksinasiPelajar = new VaksinasiPelajar();
        $maklumatVaksinasiPelajar->users_id = $user->id;
        $maklumatVaksinasiPelajar->jenis_vaksin_id = $request->jenisVaksin;
        $maklumatVaksinasiPelajar->status_vaksinasi_id = $request->statusVaksinasi;        
        $maklumatVaksinasiPelajar->save();

        return redirect()->route('pelajar-vaksinasi:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Maklumat vaksinasi sudah berjaya ditambah'
            ]
        );
    }

    public function destroy(VaksinasiPelajar $vaksinasi)
    {
        // $this->authorize('delete', $training);
        
        $vaksinasi->delete();

        return redirect()->route('pelajar-vaksinasi:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Maklumat vaksinasi sudah berjaya dihapuskan'
        ]);
    }

    // TRY DATATABLE YAJRA
    public function getVaksinasi(Request $request)
    {
        // dd($request);
        if ($request->ajax())
        {
            $user = auth()->user();
            // dd($user);
            $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";

            // $data = VaksinasiPelajar::where('users_id', $user->id)->latest()->get();
            // dd($data);

            return Datatables::of($user->vaksinasi_pelajar)
                ->addIndexColumn()
                ->addColumn('jenis', function($row)
                {
                    $columnJenis = $row->jenis_vaksin->nama_vaksin;                 
                    return $columnJenis;
                })
                ->addColumn('status', function($row)
                {
                    $columnStatus = $row->status_vaksinasi->keterangan;                 
                    return $columnStatus;
                })
                ->addColumn('action', function($row) use ($hapusMessage)
                {
                    $actionBtn =
                    '<a href="/pelajar/vaksinasi/delete/'.$row->id.'" onclick="confirm('."'$hapusMessage'".');" class="btn btn-danger">Hapus</a>';
                    // <a href="/pelajar/waris/edit/'.$row->id.'" class="btn btn-success">Kemaskini</a>
                    // <a href='/pelajar/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
