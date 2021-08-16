<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Waris;

class WarisController extends Controller
{
    //

    public function index()
    {
        $senaraiWaris = Waris::get();
        return view('admin.waris.index', compact('senaraiWaris'));
    }
    // public function create()
    // {
    //     return view('admin.waris.create');
    // }
    // public function store(Request $request)
    // {
    //     $waris = new Waris();

    //     $waris->kod_waris = $request->kod;
    //     $waris->keterangan = $request->nama;
    //     $waris->save();

    //     return redirect()->route('admin-waris:index')->with(
    //         [
    //             'alert-type' => 'alert-primary',
    //             'alert-message' => 'Waris sudah berjaya ditambah'
    //         ]
    //     );
    // }
    // public function show(Waris $waris)
    // {
    //     return view('admin.waris.show', compact('waris'));
    // }
    // public function edit(Waris $waris)
    // {
    //     return view('admin.waris.edit', compact('waris'));
    // }
    // public function update(Waris $waris, Request $request)
    // {
    //     $waris->kod_waris = $request->kod;
    //     $waris->keterangan = $request->nama;
    //     $waris->save();

    //     return redirect()->route('admin-waris:index')->with(
    //         [
    //             'alert-type'=>'alert-success',
    //             'alert-message'=>'Waris sudah berjaya dikemaskini'
    //         ]);
    // }
    // public function destroy(Waris $waris)
    // {
    //     // $this->authorize('delete', $training);
        
    //     $waris->delete();

    //     return redirect()->route('admin-waris:index')->with([
    //         'alert-type'=>'alert-danger',
    //         'alert-message'=>'Waris sudah berjaya dihapuskan'
    //     ]);
    // }
}
