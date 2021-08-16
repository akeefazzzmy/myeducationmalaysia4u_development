<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        
    }
    public function store()
    {
        
    }
    public function show()
    {
        
    }
    public function edit()
    {
        
    }
    public function update()
    {
        
    }
    public function destroy()
    {
        
    }
}
