<?php

namespace App\Http\Controllers\Pengurusan;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Negara;
use App\Models\Pelajar;
use App\Models\Pengajian;
use App\Models\Peringkat;
use App\Models\Waris;
use App\Models\Hubungan;
use App\Models\Jantina;
use App\Models\Bangsa;
use App\Models\Bidang;
use App\Models\Agama;
use App\Models\Negeri;
use App\Models\Institusi;
use App\Models\Program;
use App\Models\State;
use App\Models\StatusPengajian;
use App\Models\Tajaan;


class PelajarController extends Controller
{
    public function cariShow()
    {
        return view('pengurusan.pelajar.carian');
    }

    public function cariSenarai(Request $request)
    {
        // dd($request);
        $nokp = $request->no_kpPelajar;

        $detail_pelajar = User::where('no_kp', '=',$nokp)->first();
        $detail_pelajar2 = Pelajar::where('no_kp', '=',$nokp)->first();
        $waris_pelajar = Waris::where('no_kp', '=',$nokp)->get();
        $pengajian_pelajar = Pengajian::where('no_kp', '=',$nokp)->get();

        return view('pengurusan.pelajar.list-carian', compact(['detail_pelajar','detail_pelajar2','waris_pelajar','pengajian_pelajar']));
    }
    public function senaraiCarian($kp) //untuk breadcrumb senarai carian
    {
        $nokp = $kp;
        // $detail_pelajar = User::where('no_kp', '=',$nokp)->first();
        // $detail_pelajar2 = Pelajar::where('no_kp', '=',$nokp)->first();
        // $waris_pelajar = Waris::where('no_kp', '=',$nokp)->get();
        // $pengajian_pelajar = Pengajian::where('no_kp', '=',$nokp)->get();

        $data['detail_pelajar']=User::where('no_kp', '=',$nokp)->first();
        $data['detail_pelajar2']= Pelajar::where('no_kp', '=',$nokp)->first();
        $data['waris_pelajar']= Waris::where('no_kp', '=',$nokp)->get();
        $data['pengajian_pelajar']= Pengajian::where('no_kp', '=',$nokp)->get();

        // return view('pengurusan.pelajar.list-carian', compact(['detail_pelajar','detail_pelajar2','waris_pelajar','pengajian_pelajar']));
        return view('pengurusan.pelajar.list-carian')->with($data);
    }

    public function lihatPeribadiPelajar(Request $request)
    {
        $data['no_kp'] = $request->kp;
        // dd($no_kp);
        $data['pelajar']=Pelajar::where('no_kp', $data['no_kp'])->first();
        // dd($data['pelajar']);
        
        //untuk display data
        $data['nama']=User::where('no_kp',  $data['pelajar']->no_kp)->first();
        $data['jantina']=Jantina::where('Kod_Jantina',  $data['pelajar']->Kod_Jantina)->first();
        $data['negeriLahir']=Negeri::where('Kod_Negeri',  $data['pelajar']->Kod_NegeriLahir)->first();
        $data['bangsa']=Bangsa::where('Kod_Bangsa',  $data['pelajar']->Kod_Bangsa)->first();
        $data['agama']=Agama::where('Kod_Agama',  $data['pelajar']->Kod_Agama)->first();
        $data['negeri']=Negeri::where('Kod_Negeri',  $data['pelajar']->Kod_Negeri)->first();
        $data['negara']=Negara::where('Kod_Negara',  $data['pelajar']->Kod_Negara)->first();

        //untuk edit data
        $data['negeriDropdown']=Negeri::select('Kod_Negeri', 'NamaNegeri')->get();
        
        return view('pengurusan.pelajar.peribadi-carian')->with($data);
    }
    public function lihatWarisPelajar(Request $request)
    {
        // dd($request);

        $kp = $request->kp;
        $kpWaris = $request->kpWaris;

        $data['pelajar']=Pelajar::where('no_kp', $kp)->first();
        $data['tableWaris']=Waris::where('no_kp_Waris', $kpWaris)->first();

        $data['kpPelajar']=$kp;
        $data['waris']=Waris::where('no_kp_Waris', $kpWaris)->first();
        $data['negeriWaris']=Negeri::where('Kod_Negeri',  $data['tableWaris']->Kod_NegeriWaris)->first();
        $data['negara']=Negara::where('Kod_Negara',  $data['tableWaris']->Kod_NegaraWaris)->first();
        $data['hubungan']=Hubungan::where('Kod_Hubungan',  $data['tableWaris']->Kod_Hubungan)->first();

        //untuk dropdown negeri
        $data['negeriDropdown']=Negeri::select('Kod_Negeri', 'NamaNegeri')->get();
        $data['hubunganWarisDropdown']=Hubungan::select('Kod_Hubungan', 'Keterangan')->get();
        
        return view('pengurusan.pelajar.waris-carian')->with($data);
    }
    public function lihatPengajianPelajar(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $kp = $request->kp;

        $data['kp']=$kp;
        $data['pengajian']=Pengajian::where('Id', $id)->first();
        $data['peringkatPengajian']=Peringkat::where('Kod_Peringkat', $data['pengajian']->Kod_Peringkat)->first();
        $data['programPengajian']=Program::where('Kod_Program', $data['pengajian']->Kod_Program)->first();
        $data['institusiPengajian']=Institusi::where('Kod_Institusi', $data['pengajian']->Kod_Institusi)->first();
        $data['statePengajian']=State::where('Kod_State', $data['pengajian']->Kod_State)->first();
        $data['negaraPengajian']=Negara::where('Kod_Negara', $data['pengajian']->Kod_Negara)->first();
        $data['bidangPengajian']=Bidang::where('Kod_Bidang', $data['pengajian']->Kod_Bidang)->first();
        $data['penajaPengajian']=Tajaan::where('Kod_Penaja', $data['pengajian']->Kod_Penaja)->first();
        $data['statusPengajian']=StatusPengajian::where('Kod_StatusPengajian', $data['pengajian']->Kod_StatusPengajian)->first();
        // dd($data['peringkatPengajian']);
        
        //untuk dropdown
        $data['dropdownPeringkat']=Peringkat::get();
        $data['dropdownInstitusi']=Institusi::where('NamaInstitusi', '!=', 'Tiada Maklumat')->get();
        $data['dropdownNegeri']=Negeri::get();

        return view('pengurusan.pelajar.pengajian-carian')->with($data);
    }

    public function kemaskiniPeribadiPelajar(Request $request)
    {
        $this->validate(
            $request,
            [
                'alamat' => 'required',
                'poskod' => 'required',
                'bandar' => 'required',
                'negara' => 'required',
                'negeri' => 'required'
            ],
            [
                'alamat.min' => 'Nama State wajib di isi sekurang-kurangnya 5 karektor'
            ]
        );

        Pelajar::updateOrCreate(
            [
                'no_kp'=>$request->kp
            ],
            [
                'Alamat'=>$request->alamat,
                'Poskod'=>$request->poskod,
                'Bandar'=>$request->bandar,
                'Kod_Negeri'=>$request->negeri,
                'Kod_Negara'=>$request->negara

            ]
        );
        
        $no_kp = $request->kp;
        $data['pelajar']=Pelajar::where('no_kp', $no_kp)->first();
        
        //untuk display data
        $data['nama']=User::where('no_kp',  $data['pelajar']->no_kp)->first();
        $data['jantina']=Jantina::where('Kod_Jantina',  $data['pelajar']->Kod_Jantina)->first();
        $data['negeriLahir']=Negeri::where('Kod_Negeri',  $data['pelajar']->Kod_NegeriLahir)->first();
        $data['bangsa']=Bangsa::where('Kod_Bangsa',  $data['pelajar']->Kod_Bangsa)->first();
        $data['agama']=Agama::where('Kod_Agama',  $data['pelajar']->Kod_Agama)->first();
        $data['negeri']=Negeri::where('Kod_Negeri',  $data['pelajar']->Kod_Negeri)->first();
        $data['negara']=Negara::where('Kod_Negara',  $data['pelajar']->Kod_Negara)->first();

        //untuk edit data
        $data['negeriDropdown']=Negeri::select('Kod_Negeri', 'NamaNegeri')->get();

        return view('pengurusan.pelajar.peribadi-carian')->with($data);
        // return redirect()->to('/pengurusan/state')->with('status', 'Pendaftaran State "'.$request->namaState.'" berjaya');
    }

    public function kemaskiniWarisPelajar(Request $request)
    {
        dd($request);

        Waris::updateOrCreate(
            [
                'Id'=>$request->id
            ],
            [
                'Alamat_Waris'=>$request->alamat,
                'Poskod_Waris'=>$request->poskod,
                'Bandar_Waris'=>$request->bandar,
                'Kod_NegeriWaris'=>$request->negeri,
                'Kod_NegaraWaris'=>$request->negara,
                'Kod_Hubungan'=>$request->hubungan,
                'NoTel_Waris'=>$request->telefon
            ]
        );
        // return redirect()->to('/pengurusan/state')->with('status', 'Pendaftaran State "'.$request->namaState.'" berjaya');

        // dd($request);
        $data['pelajar']=Pelajar::where('no_kp', $request->kp)->first();
        $data['tableWaris']=Waris::where('no_kp_Waris', $request->kpWaris)->first();

        $data['kpPelajar']=$request->kp;
        $data['waris']=Waris::where('no_kp_Waris', $request->kpWaris)->first();
        $data['negeriWaris']=Negeri::where('Kod_Negeri',  $data['tableWaris']->Kod_NegeriWaris)->first();
        $data['negara']=Negara::where('Kod_Negara',  $data['tableWaris']->Kod_NegaraWaris)->first();
        $data['hubungan']=Hubungan::where('Kod_Hubungan',  $data['tableWaris']->Kod_Hubungan)->first();

        //untuk dropdown negeri
        $data['negeriDropdown']=Negeri::select('Kod_Negeri', 'NamaNegeri')->get();
        $data['hubunganWarisDropdown']=Hubungan::select('Kod_Hubungan', 'Keterangan')->get();
        
        return view('pengurusan.pelajar.waris-carian')->with($data);

        // return view('pengurusan.pelajar.waris-carian');
    }
    

    public function populate(Request $request)
    {
        $list['kodNegara']=Negara::where('Kod_Negara', '!=', 'MYS')->get();

        return $list;
    }
}
