<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StatusUsers;

class StatusUserController extends Controller
{
    //

    public function index()
    {
        $statusUsers = StatusUsers::get();
        return view('admin.statususers.index', compact('statusUsers'));
    }
    public function create()
    {
        return view('admin.statususers.create');
    }
    public function store(Request $request)
    {
        $status = new StatusUsers();

        $status->kod_status = $request->kod;
        $status->keterangan = $request->status;
        $status->save();

        return redirect()->route('admin-statusUsers:index')->with(
            [
                'alert-type' => 'alert-primary',
                'alert-message' => 'Status Pengguna sudah berjaya ditambah'
            ]
        );
    }
    public function show(StatusUsers $status)
    {
        return view('admin.statusUsers.show', compact('status'));
    }
    public function edit(StatusUsers $status)
    {
        return view('admin.statusUsers.edit', compact('status'));
    }
    public function update(StatusUsers $status, Request $request)
    {
        $status->kod_status = $request->kod;
        $status->keterangan = $request->nama;
        $status->save();

        return redirect()->route('admin-statusUsers:index')->with(
            [
                'alert-type'=>'alert-success',
                'alert-message'=>'Status Pengguna sudah berjaya dikemaskini'
            ]);
    }
    public function destroy(StatusUsers $status)
    {
        // $this->authorize('delete', $training);
        
        $status->delete();

        return redirect()->route('admin-statusUsers:index')->with([
            'alert-type'=>'alert-danger',
            'alert-message'=>'Status Pengguna sudah berjaya dihapuskan'
        ]);
    }
}
