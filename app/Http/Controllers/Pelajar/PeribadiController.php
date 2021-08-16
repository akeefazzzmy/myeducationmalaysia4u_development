<?php

namespace App\Http\Controllers\Pelajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use DB;

use App\Models\User;
use App\Models\ProfilPelajar;
use App\Models\Agama;
use App\Models\Bangsa;
use App\Models\Jantina;
use App\Models\Negeri;
use App\Models\StatusVaksinasi;
// use App\Models\KesihatanPelajar;

class PeribadiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $senaraiAgama = Agama::get();
        $senaraiBangsa = Bangsa::get();
        $senaraiJantina = Jantina::get();
        $senaraiNegeri = Negeri::get()->sortBy('keterangan');

        return view('pelajar.peribadi.index', compact('user', 'senaraiAgama', 'senaraiBangsa', 'senaraiJantina', 'senaraiNegeri'));
    }

    public function edit()
    {
        $user = Auth::user();

        $senaraiAgama = Agama::get();
        $senaraiBangsa = Bangsa::get();
        $senaraiJantina = Jantina::get();
        $senaraiNegeri = Negeri::get()->sortBy('keterangan');
        $senaraiStatusVaksinasi = StatusVaksinasi::get();
        // dd($senaraiStatusVaksinasi);

        return view('pelajar.peribadi.edit', compact('user', 'senaraiAgama', 'senaraiBangsa', 'senaraiJantina', 'senaraiNegeri', 'senaraiStatusVaksinasi'));
    }

    public function update(Request $request, User $userID)
    {
        // dd($request);

        $userID->no_tel = $request->no_tel;
        $userID->email = $request->emel;
        $userID->save();

        $userID->profil_pelajar->agama_id = $request->agama;
        $userID->profil_pelajar->bangsa_id = $request->bangsa;
        $userID->profil_pelajar->jantina_id = $request->jantina;
        $userID->profil_pelajar->tarikh_lahir = $request->tarikhLahir;
        $userID->profil_pelajar->negeri_lahir = $request->negeri_lahir;
        $userID->profil_pelajar->alamat_malaysia = $request->alamat_malaysia;
        $userID->profil_pelajar->poskod_malaysia = $request->poskod_malaysia;
        $userID->profil_pelajar->negeri_alamat = $request->negeri_alamat;
        $userID->profil_pelajar->bandar_malaysia = $request->bandar_malaysia;
        $userID->profil_pelajar->save();
        
        // $userID->kesihatan_pelajar->users_id = $userID->id;
        // $userID->kesihatan_pelajar->status_vaksinasi_id = $request->status_vaksinasi;
        // $userID->kesihatan_pelajar->save();

        // dd($userID->profil_pelajar->alamat_malaysia);

        return redirect()->route('pelajar-peribadi:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Negeri sudah berjaya dikemaskini'
            ]);

        // dd($request);
        
        // if($request->agama)
        // {
        //     DB::table('profil_pelajar')->where('id', $request->profilid)->update(['agama_id' => $request->agama]);

        //     return redirect()->route('pelajar-peribadi:index')->with(
        //         [
        //             'alert-type'=>'alert-success',
        //             'alert-message'=>'Agama sudah berjaya dikemaskini'
        //         ]);
        // }
        // elseif($request->bangsa)
        // {
        //     DB::table('profil_pelajar')->where('id', $request->profilid)->update(['bangsa_id' => $request->bangsa]);

        //     return redirect()->route('pelajar-peribadi:index')->with(
        //         [
        //             'alert-type'=>'alert-success',
        //             'alert-message'=>'Bangsa sudah berjaya dikemaskini'
        //         ]);
        // }
        // elseif($request->jantina)
        // {
        //     DB::table('profil_pelajar')->where('id', $request->profilid)->update(['jantina_id' => $request->jantina]);

        //     return redirect()->route('pelajar-peribadi:index')->with(
        //         [
        //             'alert-type'=>'alert-success',
        //             'alert-message'=>'Jantina sudah berjaya dikemaskini'
        //         ]);
        // }
        // elseif($request->emel)
        // {
        //     DB::table('users')->where('id', $request->userid)->update(['email' => $request->emel]);

        //     return redirect()->route('pelajar-peribadi:index')->with(
        //         [
        //             'alert-type'=>'alert-success',
        //             'alert-message'=>'Emel sudah berjaya dikemaskini'
        //         ]);
        // }
        // elseif($request->no_tel)
        // {
        //     DB::table('users')->where('id', $request->userid)->update(['no_tel' => $request->no_tel]);

        //     return redirect()->route('pelajar-peribadi:index')->with(
        //         [
        //             'alert-type'=>'alert-success',
        //             'alert-message'=>'Nombor Telefon sudah berjaya dikemaskini'
        //         ]);
        // }
        // elseif($request->alamat_malaysia || $request->bandar_malaysia || $request->poskod_malaysia || $request->negeri_alamat)
        // {
        //     DB::table('profil_pelajar')
        //     ->where('id', $request->profilid)
        //     ->update(
        //         [
        //                 'alamat_malaysia' => $request->alamat_malaysia,
        //                 'bandar_malaysia' => $request->bandar_malaysia,
        //                 'poskod_malaysia' => $request->poskod_malaysia,
        //                 'negeri_alamat' => $request->negeri_alamat                    
        //         ]);

        //         return redirect()->route('pelajar-peribadi:index')->with(
        //             [
        //                 'alert-type'=>'alert-success',
        //                 'alert-message'=>'Alamat sudah berjaya dikemaskini'
        //             ]);
        // }
        // elseif($request->tarikhLahir)
        // {
        //     DB::table('profil_pelajar')->where('id', $request->profilid)->update(['tarikh_lahir' => $request->tarikhLahir]);

        //         return redirect()->route('pelajar-peribadi:index')->with(
        //             [
        //                 'alert-type'=>'alert-success',
        //                 'alert-message'=>'Tarikh Lahir sudah berjaya dikemaskini'
        //             ]);
        // }
        // elseif($request->negeri_lahir)
        // {
        //     DB::table('profil_pelajar')->where('id', $request->profilid)->update(['negeri_lahir' => $request->negeri_lahir]);

        //         return redirect()->route('pelajar-peribadi:index')->with(
        //             [
        //                 'alert-type'=>'alert-success',
        //                 'alert-message'=>'Negeri Lahir sudah berjaya dikemaskini'
        //             ]);
        // }
    }
}