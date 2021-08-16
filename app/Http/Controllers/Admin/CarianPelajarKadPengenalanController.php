<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
use Illuminate\Support\Facades\Auth;
use DataTables;

class CarianPelajarKadPengenalanController extends Controller
{
    //
    public function index()
    {
        return view('admin.carianpelajar.nokp.index');
    }
    public function show(Request $request)
    {
        $noKP = $request->nokp;
        $pelajar = User::where('no_kp', $noKP)->where('capaian_id', '5')->first();
        return view('admin.carianpelajar.nokp.show', compact('pelajar'));
    }
    public function showGet(User $pelajar)
    {        
        return view('admin.carianpelajar.nokp.show', compact('pelajar'));
    }

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
                    $actionBtn =
                    '<a href="/admin/carianPelajar/waris/edit/'.$row->id.'/'.$pelajar->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="/admin/carianPelajar/delete/'.$row->id.'" onclick="return confirm('."'$message'".');" class="btn btn-danger">Hapus</a>';
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
                // ->addColumn('tarikhMulaPengajian', function($row)
                // {
                //     $tarikhMulaPengajian = $row->tarikh_mula;
                //     // dd($tarikhMulaPengajian);
                //     $columnTarikhMulaPengajian = \Carbon\Carbon::parse($tarikhMulaPengajian)->format('d/m/Y');

                //     return $columnTarikhMulaPengajian;
                // })
                // ->addColumn('tarikhTamatPengajian', function($row)
                // {
                //     $tarikhTamatPengajian = $row->tarikh_tamat;
                //     $columnTarikhTamatPengajian = \Carbon\Carbon::parse($tarikhTamatPengajian)->format('d/m/Y');

                //     return $columnTarikhTamatPengajian;
                // })
                ->addColumn('action', function($row) use($hapusMessage, $pelajar)
                {
                    $actionBtn =
                    '<a href="/admin/carianPelajar/pengajianPelajar/edit/'.$row->id.'/'.$pelajar->id.'" class="btn btn-success">Kemaskini</a>
                    <a href="/admin/carianPelajar/pengajianPelajar/delete/'.$row->id.'/'.$pelajar->id.'" onclick="return confirm('."'$hapusMessage'".')" class="btn btn-danger">Hapus</a>';
                    // <a href="/admin/carianPelajar/pengajianPelajar/'.$row->id.'" class="btn btn-primary">Papar</a>
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
                    $actionBtn =
                    '<a href="/admin/carianPelajar/vaksinasiPelajar/delete/'.$row->id.'/'.$pelajar->id.'" onclick="confirm('."'$hapusMessage'".');" class="btn btn-danger">Hapus</a>';
                    // <a href="/pelajar/waris/edit/'.$row->id.'" class="btn btn-success">Kemaskini</a>
                    // <a href='/pelajar/statuspengajian/$row->id' class='btn btn-primary'>Papar</a>
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    //waris pelajar
    public function warisPelajarCreate(User $pelajar)
    {
        $senaraiHubungan = Hubungan::get();
        
        return view('admin.maklumatpelajar.waris.create', compact('senaraiHubungan', 'pelajar'));
    }
    public function warisPelajarStore(Request $request, User $pelajar)
    {
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

        return redirect()->route('admin-carianPelajar-noKP-waris:create', $pelajar)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Waris sudah berjaya didaftarkan'
            ]
        );
    }
    public function warisPelajarEdit(Waris $waris, User $pelajar)
    {
        $senaraiHubungan = Hubungan::get();
        return view('admin.maklumatpelajar.waris.edit', compact('waris', 'pelajar', 'senaraiHubungan'));
    }
    public function warisPelajarUpdate(Waris $waris, User $pelajar, Request $request)
    {
        $waris->no_kp = $request->no_kp;
        $waris->nama = $request->nama;
        $waris->alamat = $request->alamatRumah;
        $waris->bandar = $request->bandar;
        $waris->poskod = $request->poskod;
        $waris->no_tel = $request->no_tel;
        $waris->no_kp_kemaskini = auth()->user()->no_kp;
        $waris->profil_pelajar_id = $pelajar->profil_pelajar->id;
        $waris->hubungan_id = $request->hubungan;
        $waris->save();
        
        return redirect()->route('admin-carianPelajar-noKP:showGet', $pelajar)->with(
            [
                'alert-type' => 'alert-success',
                'alert-message' => 'Waris sudah berjaya dikemaskini'
            ]
        );
    }
    public function warisPelajarDestroy(Waris $waris)
    {        
        $waris->delete();
        $userID_pelajar = $waris->profil_pelajar->users;
        
        return redirect()->route('admin-carianPelajar-noKP:showGet', $userID_pelajar)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Waris sudah berjaya dihapuskan'
        ]);
    }

    //pengajian pelajar
    public function pengajianPelajarCreate(User $pelajar)
    {
        $senaraiNegara = Negara::get();
        $senaraiInstitusi = Institusi::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidangPengajian = Bidang::get();
        $senaraiProgramPengajian = ProgramPengajian::get();

        return view('admin.maklumatpelajar.pengajianpelajar.create', compact(
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
        return redirect()->route('admin-carianPelajar-noKP-pengajianPelajar:create', $pelajar)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Maklumat Pengajian pelajar sudah berjaya didaftarkan'
            ]
        );
    }
    // public function pengajianPelajarShow(PengajianPelajar $pengajian)
    // {
    //     $senaraiPenajaPengajian = $pengajian->penaja_pengajian;
    //     $senaraiAlamatPenginapanPengajian = $pengajian->alamat_penginapan_pengajian;

    //     return view('admin.maklumatpelajar.pengajianpelajar.edit', compact('pengajian', 'senaraiPenajaPengajian', 'senaraiAlamatPenginapanPengajian'));
    // }
    public function pengajianPelajarEdit(PengajianPelajar $pengajian, User $pelajar)
    {
        // dd($pelajar);
        $senaraiNegara = Negara::get();
        $senaraiState = States::get();
        $senaraiProgram = ProgramPengajian::get();
        $senaraiTahapPengajian = TahapPengajian::get();
        $senaraiBidang = Bidang::get();
        // $senaraiInstitusiPengajian = Institusi::get();

        return view('admin.maklumatpelajar.pengajianpelajar.edit', compact(
            [
                'pengajian',
                'pelajar',
                'senaraiNegara',
                'senaraiState',
                'senaraiProgram',
                'senaraiTahapPengajian',
                'senaraiBidang'
                // 'senaraiInstitusiPengajian'
            ]));
    }
    public function pengajianPelajarUpdate(PengajianPelajar $pengajian, User $pelajar, Request $request)
    {
        // dd($pelajar->profil_pelajar->id);
        // dd($request);

        $pengajian->profil_pelajar_id = $pelajar->profil_pelajar->id;
        $pengajian->kod_negara = $request->negara;

        $pengajian->kod_states = $request->state;
        $pengajian->institusi_id = $request->institusi;
        $pengajian->tahap_pengajian_id = $request->tahapPengajian;
        $pengajian->kod_bidang = $request->bidangPengajian;
        $pengajian->program_pengajian_id = $request->programPengajian;
        $pengajian->tarikh_mula = $request->tarikh_mula;
        $pengajian->tarikh_tamat = $request->tarikh_tamat;
        $pengajian->user_id_kemaskini = auth()->user()->id;
        $pengajian->save();

        return redirect()->route('admin-carianPelajar-noKP-pengajianPelajar:edit', ['pengajian'=>$pengajian,'pelajar'=>$pelajar])->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Maklumat Pengajian sudah berjaya dikemaskini'
            ]);
    }
    public function pengajianPelajarDestroy(PengajianPelajar $pengajian, $pelajar)
    {
        // dd($pelajar);
        $pengajian->alamat_penginapan_pengajian()->delete();
        $pengajian->penaja_pengajian()->delete();
        $pengajian->delete();

        return redirect()->route('admin-carianPelajar-noKP:showGet', $pelajar)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Maklumat Pengajian Pelajar sudah berjaya dihapuskan'
        ]);
    }
    
    public function populateNegaraToStates(Request $request)
    {
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

    //vaksinasi pelajar
    public function vaksinasiPelajarCreate(User $pelajar)
    {
        // dd($pelajar);
        $senaraiStatusVaksinasi = StatusVaksinasi::get();
        $senaraiJenisVaksin = JenisVaksin::get();
        return view('admin.maklumatpelajar.vaksinasi.create', compact('pelajar', 'senaraiStatusVaksinasi', 'senaraiJenisVaksin'));
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

        return redirect()->route('admin-carianPelajar-noKP-vaksinasiPelajar:create', $pelajar)->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Maklumat vaksinasi pelajar sudah berjaya didaftarkan'
            ]
        );
    }
    public function vaksinasiPelajarDestroy(VaksinasiPelajar $vaksinasi, $pelajar)
    {        
        $vaksinasi->delete();

        return redirect()->route('admin-carianPelajar-noKP:showGet', $pelajar)->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Maklumat vaksinasi sudah berjaya dihapuskan'
        ]);
    }
}
