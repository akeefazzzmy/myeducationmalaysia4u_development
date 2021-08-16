<?php

namespace App\Http\Controllers\Pengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tajaan;

use Carbon\Carbon;

class TajaanController extends Controller
{
    public function senarai()
    {
        Tajaan::updateOrCreate(
            [
                'Kod_Penaja'=>'0'
            ],
            [
                'Kod_Penaja'=>'0',
                'NamaPenaja'=>'LAIN-LAIN',
                'NamaSingkatan'=>'LAIN-LAIN',
            ]
        );

     //query all data from table 'negeri' using model
        $senarai_tajaan = Tajaan::orderBy('NamaPenaja','ASC')->get();

     // return to view with data
     //resources/views/pengurusan/state/senarai.blade.php
     return view('pengurusan.tajaan.senarai', compact('senarai_tajaan'))->with('status', 'Pendaftaran Penaja Berjaya');

    }

    public function lihat(Tajaan $tajaan)
       {
            //resources/views/pengurusan/negeri/lihat.blade.php
           return view('pengurusan.tajaan.lihat', compact('tajaan'));
       }

       public function kemaskini(Tajaan $tajaan, Request $request)
       {
        //    dd($request);
        //    $this->validate(
        //        $request,
        //        [
        //            'NamaTajaan' => 'required|min:5',
        //            'SName' => 'required|min:5'
        //        ],
        //        [
        //            'NamaTajaan.min' => 'Nama Penaja wajib di isi sekurang-kurangnya 5 karektor',
        //            'SName.min' => 'Nama Penuh Penaja wajib di isi sekurang-kurangnya 5 karektor'
        //        ]
        //    );
        //    $tajaan->NamaPenaja = $request->NamaTajaan;
        //    $tajaan->NamaSingkatan =$request->SName;
        //    $tajaan->save();

        Tajaan::updateOrCreate(
            [
                'Kod_Penaja' => $request->KodTajaan
            ],
            [
                'Kod_Penaja' => $request->KodTajaan,
                'NamaPenaja'=>$request->NamaTajaan,
                'NamaSingkatan' => $request->SName,
                'Id_PegawaiKemaskini'=>$request->idPeg,
                'Tarikh_Kemaskini'=>Carbon::now(),
            ]
        );
        
        return redirect()->to('pengurusan/tajaan')->with('status', 'Maklumat Penaja '.$request->NamaTajaan.' berjaya dikemaskini');

        //    return redirect()->back()->with('status','Berjaya dikemaskini maklumat Penaja');
       }

       public function showCreateNew(Request $request)
        {
            $data['kodPenaja'] = Tajaan::select('Kod_Penaja')->orderBy('Kod_Penaja', 'DESC')->first();
            // dd($data['kodPenaja']->Kod_Penaja);
            $kodPenaja = $data['kodPenaja']->Kod_Penaja;
            $kodPenajaTambahSatu = $kodPenaja + 1;
            // dd($kodPenajaTambahSatu);
            
            // return view('pengurusan.tajaan.create')->with($kodPenajaTambahSatu);
            return view('pengurusan.tajaan.create', compact('kodPenajaTambahSatu'));
        }

        public function adminCreateSimpan(Request $request)
        {
            // dd($request->idPeg);
            
            Tajaan::updateOrCreate(
                [
                    'Kod_Penaja'=>$request->kodPenaja,
                ],
                [
                    'Kod_Penaja'=>$request->kodPenaja,
                    'NamaPenaja'=>$request->namaPenaja,
                    'NamaSingkatan'=>$request->namaSingkatanPenaja,
                    'Id_Pegawai'=>$request->idPeg,
                    'Tarikh_Wujud'=>Carbon::now(),
                    'Id_PegawaiKemaskini'=>$request->idPeg,
                    'Tarikh_Kemaskini'=>Carbon::now(),
                ]
            );
    
            // return json_encode(['data'=>'succcess'],200);
            return redirect()->to('/pengurusan/tajaan')->with('status', 'Pendaftaran Penaja '.$request->namaPenaja.' berjaya');
        }
}
