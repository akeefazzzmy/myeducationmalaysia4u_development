<?php

namespace App\Http\Controllers\Em;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\PengajianPelajar;
// use App\Models\Em;
use App\Models\LiputanEm;
use App\Models\Negara;
use App\Models\States;
use App\Models\Institusi;
use App\Models\TahapPengajian;
use App\Models\Bidang;
use App\Models\ProgramPengajian;
use App\Models\User;
use App\Models\Waris;

use DataTables;
use DB;

class PengajianPelajarController extends Controller
{
    //
    // public function index(PengajianPelajar $pengajianPelajar)
    // {
    //     $pengajianPelajar = PengajianPelajar::get();
        
    //     return view('admin.pengajianpelajar.index', compact('pengajianPelajar'));
    // }
    public function index()
    {
        // // dd($request);
        // $user = auth()->user();

        // $em = $user->em;
        // $kod_em = $em->kod_em;
        // $negaraLiputanEm = $em->liputan_em;

        // if($request->search != null)
        // {
        //     //perform search
        //     $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $request->search)->paginate(5)->withQueryString();
        // }
        // else
        // {
        //     $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $request->search)->paginate(5)->withQueryString();
        // }
        
        // return view('em.pengajianpelajar.index', compact('negaraLiputanEm', 'user', 'senaraiPengajianPelajar'));
        return view('em.pengajianpelajar.index');
    }

    public function show(Request $request)
    {
        // dd($request);

        $capaian_id = '5';
        $nokp_pelajar = $request->nokp;

        $pelajar = User::where('capaian_id', $capaian_id)->where('no_kp', $nokp_pelajar)->first();

        // dd($pelajar);

        return view('em.pengajianpelajar.show', compact('pelajar'));
    }

    // public function indexShow(Request $request, $negarapengajian)
    // {
    //     // dd($negarapengajian);
    //     $user = auth()->user();

    //     $em = $user->em;
    //     $kod_em = $em->kod_em;
    //     $negaraLiputanEm = $em->liputan_em;

    //     if($request->search != null)
    //     {
    //         //perform search
    //         // $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $request->search)->paginate(5)->withQueryString();
    //         $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $request->search)->paginate(5)->withQueryString();
    //     }
    //     else
    //     {
    //         // $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $request->search)->paginate(5)->withQueryString();
    //         $senaraiPengajianPelajar = PengajianPelajar::where('kod_negara', $negarapengajian)->paginate(5)->withQueryString();
    //     }
        
    //     // return view('em.pengajianpelajar.indexShow', compact('negaraLiputanEm', 'user', 'senaraiPengajianPelajar'));
    //     return view('em.pengajianpelajar.indexShow', compact('user', 'negaraLiputanEm', 'senaraiPengajianPelajar'));
    // }
    
    public function create()
    {
        $user = Auth::user();

        $em = $user->em;
        $kod_em = $em->kod_em;
        $negaraLiputanEm = $em->liputan_em;

        // $senaraiNegara = Negara::get();
        $senaraiInstitusi = Institusi::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidangPengajian = Bidang::get();
        $senaraiProgramPengajian = ProgramPengajian::get();

        return view('em.pengajianpelajar.create', compact(
            [
                'user',
                'negaraLiputanEm',
                // 'senaraiNegara',
                'senaraiInstitusi',
                'senaraiBidangPengajian',
                'senaraiTahapPengajian',
                'senaraiProgramPengajian'
            ]));
    }

    public function store(Request $request)
    {
        // dd($request);
        $pengajianPelajar = new PengajianPelajar();
        $pengajianPelajar->profil_pelajar_id = $request->profilPelajarID;
        $pengajianPelajar->kod_negara = $request->negara;
        $pengajianPelajar->kod_states = $request->state;
        $pengajianPelajar->institusi_id = $request->institusiPengajian;        
        $pengajianPelajar->tahap_pengajian_id = $request->tahapPengajian;
        $pengajianPelajar->kod_bidang = $request->bidangPengajian;
        $pengajianPelajar->program_pengajian_id = $request->programPengajian;
        $pengajianPelajar->tarikh_mula = $request->tarikhMulaPengajian;
        $pengajianPelajar->tarikh_tamat = $request->tarikhTamatPengajian;

        $pengajianPelajar->save();

        return redirect()->route('em-pengajianpelajar:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Pengajian sudah berjaya ditambah'
            ]
        );
    }
    // public function show(PengajianPelajar $pengajian)
    // {
    //     dd($pengajian);
    //     $senaraiAlamatPenginapanPengajian = $pengajian->alamat_penginapan_pengajian;
    //     $senaraiPenajaPengajian = $pengajian->penaja_pengajian;

    //     return view('pelajar.pengajianpelajar.show', compact('pengajian', 'senaraiAlamatPenginapanPengajian', 'senaraiPenajaPengajian'));
    // }
    public function edit(PengajianPelajar $pengajianpelajar, $negarapengajian)
    {
        $user = Auth::user();
        // dd($user->em->kod_em);
        // dd($negarapengajian);
        // $senaraiNegara = Negara::where('kod_em', $user->em->kod_em)->get();
        $senaraiNegaraBawahLiputan = LiputanEm::where('kod_em', $user->em->kod_em)->get();
        // dd($senaraiNegaraBawahLiputan);
        $senaraiState = States::get();
        $senaraiProgram = ProgramPengajian::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidang = Bidang::get();
        // $senaraiInstitusiPengajian = Institusi::get();

        return view('em.pengajianpelajar.edit', compact(
            [
                'pengajianpelajar',
                'senaraiNegaraBawahLiputan',
                'senaraiState',
                'senaraiProgram',
                'senaraiTahapPengajian',
                'senaraiBidang',
                // 'senaraiInstitusiPengajian'
                'negarapengajian'
            ]));

        // return view('em.pengajianpelajar.edit', compact('pengajianpelajar', 'negarapengajian'));
    }

    public function update(Request $request, PengajianPelajar $pengajianpelajar)
    {
        // dd($pengajianpelajar);

        $pengajianpelajar->kod_negara = $request->negara;
        $pengajianpelajar->kod_states = $request->state;
        $pengajianpelajar->institusi_id = $request->institusi;
        $pengajianpelajar->tahap_pengajian_id = $request->tahapPengajian;
        $pengajianpelajar->kod_bidang = $request->bidangPengajian;
        $pengajianpelajar->program_pengajian_id = $request->programPengajian;
        $pengajianpelajar->tarikh_mula = $request->tarikh_mula;
        $pengajianpelajar->tarikh_tamat = $request->tarikh_tamat;
        $pengajianpelajar->save();

        dd('updated');

        // return redirect()->route('pelajar-pengajianpelajar:index')->with(
        //     [
        //         'alert-type'=>'alert-success',
        //         'alert-message'=>'Maklumat Pengajian sudah berjaya dikemaskini'
        //     ]);
    }

    // public function show(PengajianPelajar $pengajian)
    // {
    //     // dd($pengajian);
    //     $senaraiAlamatPenginapanPengajian = $pengajian->alamat_penginapan_pengajian;
    //     // dd($senaraiAlamatPenginapanPengajian);
    //     $senaraiPenajaPengajian = $pengajian->penaja_pengajian;
    //     // dd($senaraiPenajaPengajian);

    //     return view('pelajar.pengajianpelajar.show', compact('pengajian', 'senaraiAlamatPenginapanPengajian', 'senaraiPenajaPengajian'));
    // }

    public function destroy(PengajianPelajar $pengajian)
    {
        // dd($pengajian);
        $pengajian->alamat_penginapan_pengajian()->delete();
        $pengajian->penaja_pengajian()->delete();
        $pengajian->delete();

        return redirect()->route('em-pengajianpelajar:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Maklumat Pengajian Pelajar sudah berjaya dihapuskan'
        ]);
    }

    //POPULATE
    public function populateNegaraToStates(Request $request)
    {
        // dd($request);
        $senaraiStates = States::where('kod_negara', $request->kod_negara)->get();
        return $senaraiStates;
    }
    public function populateStatesToInstitusi(Request $request)
    {
        $senaraInstitusi = Institusi::where('kod_states', $request->kod_state)->get();
        return $senaraInstitusi;
    }
    public function populateBidangToProgram(Request $request)
    {
        $senaraiProgram = ProgramPengajian::where('kod_bidang', $request->kod_bidang)->get();
        return $senaraiProgram;
    }

    //DATATABLE START
    public function getWaris(Request $request, User $pelajar)
    {
        if ($request->ajax())
        {
            $profilPelajarId = $pelajar->profil_pelajar->id;
            
            $message = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";

            $data = Waris::where('profil_pelajar_id', $profilPelajarId)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('hubungan', function($row)
                {
                    $columnHubungan = $row->hubungan->keterangan;                 
                    return $columnHubungan;
                })
                ->addColumn('action', function($row) use ($message, $pelajar)
                {
                    $buttonKemaskini = '/kedutaan/pengurusanpelajar/waris/edit/';
                    $buttonHapus = '/kedutaan/pengurusanpelajar/delete/';
                    
                    $actionBtn =
                    '<a href="'.$buttonKemaskini.''.$row->id.'/'.$pelajar->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="'.$buttonHapus.''.$row->id.'" onclick="return confirm('."'$message'".');" class="btn btn-danger">Hapus</a>';
                    // <a href='/pelajar/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getPengajianPelajar(Request $request, User $pelajar)
    {
        if ($request->ajax())
        {
            $profil = $pelajar->profil_pelajar;
            $data = PengajianPelajar::where('profil_pelajar_id', $profil->id)->latest()->get();
            $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tahapPengajian', function($row)
                {
                    $columnTahapPengajian = $row->tahap_pengajian->keterangan;
                    return $columnTahapPengajian;
                })
                ->addColumn('bidangPengajian', function($row)
                {
                    $columnBidangPengajian = $row->bidang->nama_bidang;
                    return $columnBidangPengajian;
                })
                ->addColumn('action', function($row) use($hapusMessage, $pelajar)
                {
                    $buttonKemaskini = '/kedutaan/pengurusanpelajar/pengajianPelajar/edit/';
                    $buttonHapus = '/kedutaan/pengurusanpelajar/pengajianPelajar/delete/';

                    $actionBtn =
                    '<a href="'.$buttonKemaskini.''.$row->id.'/'.$pelajar->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="'.$buttonHapus.''.$row->id.'/'.$pelajar->id.'" onclick="return confirm('."'$hapusMessage'".')" class="btn btn-danger">Hapus</a>';
                    // <a href="/kedutaan/pengurusanpelajar/pengajianPelajar/'.$row->id.'" class="btn btn-primary">Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getVaksinasi(Request $request, User $pelajar)
    {
        if ($request->ajax())
        {
            $hapusMessage = "Rekod yang dihapuskan tidak dapat dikembalikan. Anda pasti untuk menghapuskan rekod yang dipilih?";

            return Datatables::of($pelajar->vaksinasi_pelajar)
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
                ->addColumn('action', function($row) use ($hapusMessage, $pelajar)
                {
                    $buttonHapus = '/kedutaan/pengurusanpelajar/vaksinasiPelajar/delete/';

                    $actionBtn =
                    '<a href="'.$buttonHapus.''.$row->id.'/'.$pelajar->id.'" onclick="confirm('."'$hapusMessage'".');" class="btn btn-danger">Hapus</a>';
                    // <a href="/pelajar/waris/edit/'.$row->id.'" class="btn btn-success">Kemaskini</a>
                    // <a href='/pelajar/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
