<?php

namespace App\Http\Controllers\Kedutaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Waris;
use App\Models\PengajianPelajar;
use App\Models\Hubungan;
use App\Models\Negara;
use App\Models\States;
use App\Models\Institusi;
use App\Models\TahapPengajian;
use App\Models\Bidang;
use App\Models\ProgramPengajian;
use App\Models\StatusVaksinasi;
use App\Models\JenisVaksin;
use App\Models\VaksinasiPelajar;
use DataTables;

class PengurusanPelajarController extends Controller
{
    //
    public function index()
    {
        return view('kedutaan.pengurusanpelajar.nokp.index');
    }
    public function show(Request $request)
    {
        // dd($request);
        $capaian_id = '5';
        $nokp_pelajar = $request->nokp;

        $pelajar = User::where('capaian_id', $capaian_id)->where('no_kp', $nokp_pelajar)->first();
        // dd($pelajar);

        return view('kedutaan.pengurusanpelajar.nokp.show', compact('pelajar'));

    }
    public function showGet(User $pelajar)
    {        
        return view('kedutaan.pengurusanpelajar.nokp.show', compact('pelajar'));
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
    //DATATABLE END

    //WARIS PELAJAR
    public function warisPelajarCreate(User $pelajar)
    {
        // dd($pelajar);
        $senaraiHubungan = Hubungan::get();

        return view('kedutaan.pengurusanpelajar.nokp.waris-create', compact('pelajar', 'senaraiHubungan'));
    }
    public function warisPelajarStore(Request $request, User $pelajar)
    {
        // dd($request);

        $waris = new Waris();
        $waris->no_kp = $request->no_kp;
        $waris->nama = $request->nama;
        $waris->alamat = $request->alamat;
        $waris->bandar = $request->daerah;
        $waris->poskod = $request->poskod;
        $waris->no_tel = $request->no_tel;
        $waris->profil_pelajar_id = $pelajar->profil_pelajar->id;
        $waris->hubungan_id = $request->hubungan;
        $waris->no_kp_wujud = auth()->user()->no_kp;
        $waris->no_kp_kemaskini = auth()->user()->no_kp;
        $waris->save();

        return redirect()->route('kedutaan-pengurusanpelajar-waris:create', $pelajar)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Waris sudah berjaya didaftarkan'
            ]
        );
    }
    public function warisPelajarDestroy(Waris $waris)
    {        
        $waris->delete();
        $userID_pelajar = $waris->profil_pelajar->users;
        
        return redirect()->route('kedutaan-carianPelajar-noKP:showGet', $userID_pelajar)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Waris pelajar sudah berjaya dihapuskan'
        ]);
    }

    //PENGAJIAN PELAJAR
    public function pengajianPelajarCreate(User $pelajar)
    {
        $senaraiNegara = Negara::get();
        $senaraiInstitusi = Institusi::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidangPengajian = Bidang::get();
        $senaraiProgramPengajian = ProgramPengajian::get();

        return view('kedutaan.pengurusanpelajar.nokp.pengajianpelajar-create', compact(
            [
                'pelajar',
                'senaraiNegara',
                'senaraiInstitusi',
                'senaraiBidangPengajian',
                'senaraiTahapPengajian',
                'senaraiProgramPengajian'
            ]));
    }
    public function pengajianPelajarStore(Request $request, User $pelajar)
    {
        // dd($pelajar->profil_pelajar->id);
        // dd($request);
        $pengajianPelajar = new PengajianPelajar();

        $pengajianPelajar->profil_pelajar_id = $pelajar->profil_pelajar->id;
        $pengajianPelajar->kod_negara = $request->negara;
        $pengajianPelajar->kod_states = $request->state;
        $pengajianPelajar->institusi_id = $request->institusiPengajian;        
        $pengajianPelajar->tahap_pengajian_id = $request->tahapPengajian;
        $pengajianPelajar->kod_bidang = $request->bidangPengajian;
        $pengajianPelajar->program_pengajian_id = $request->programPengajian;
        $pengajianPelajar->tarikh_mula = $request->tarikhMulaPengajian;
        $pengajianPelajar->tarikh_tamat = $request->tarikhTamatPengajian;
        $pengajianPelajar->save();

        // dd('berjaya ditambah');
        return redirect()->route('kedutaan-carianPelajar-noKP-pengajianPelajar:create', $pelajar)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Maklumat Pengajian pelajar sudah berjaya didaftarkan'
            ]
        );
    }
    public function pengajianPelajarDestroy(PengajianPelajar $pengajian, $pelajar)
    {
        // dd($pelajar);
        $pengajian->alamat_penginapan_pengajian()->delete();
        $pengajian->penaja_pengajian()->delete();
        $pengajian->delete();

        return redirect()->route('kedutaan-carianPelajar-noKP:showGet', $pelajar)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Maklumat Pengajian Pelajar sudah berjaya dihapuskan'
        ]);
    }

    //VAKSINASI PELAJAR
    public function vaksinasiPelajarCreate(User $pelajar)
    {
        // dd($pelajar);
        $senaraiStatusVaksinasi = StatusVaksinasi::get();
        $senaraiJenisVaksin = JenisVaksin::get();
        return view('kedutaan.pengurusanpelajar.nokp.vaksinasipelajar-create', compact('pelajar', 'senaraiStatusVaksinasi', 'senaraiJenisVaksin'));
    }
    public function vaksinasiPelajarStore(Request $request, User $pelajar)
    {
        // dd($request);
        $user = auth()->user();

        $maklumatVaksinasiPelajar = new VaksinasiPelajar();
        $maklumatVaksinasiPelajar->users_id = $pelajar->id;
        $maklumatVaksinasiPelajar->jenis_vaksin_id = $request->jenisVaksin;
        $maklumatVaksinasiPelajar->status_vaksinasi_id = $request->statusVaksinasi;        
        $maklumatVaksinasiPelajar->save();

        return redirect()->route('kedutaan-carianPelajar-noKP-vaksinasiPelajar:create', $pelajar)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Maklumat vaksinasi pelajar sudah berjaya didaftarkan'
            ]
        );
    }
    public function vaksinasiPelajarDestroy(VaksinasiPelajar $vaksinasi, $pelajar)
    {        
        $vaksinasi->delete();

        return redirect()->route('kedutaan-carianPelajar-noKP:showGet', $pelajar)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Maklumat vaksinasi pelajar sudah berjaya dihapuskan'
        ]);
    }

    //POPULATE START
    public function populateNegaraToStates(Request $request)
    {
        $senaraiStates = States::where('kod_negara', $request->kod_negara)->get();
        return $senaraiStates;
    }
    public function populateStatesToInstitusi(Request $request)
    {
        // dd($request);
        $senaraInstitusi = Institusi::where('kod_states', $request->kod_state)->get();
        return $senaraInstitusi;
    }
    public function populateBidangToProgram(Request $request)
    {
        $senaraiProgram = ProgramPengajian::where('kod_bidang', $request->kod_bidang)->get();
        return $senaraiProgram;
    }
    //POPULATE END
}
