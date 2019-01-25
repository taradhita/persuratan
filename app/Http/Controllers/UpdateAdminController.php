<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class UpdateAdminController extends Controller
{
    public function edit(Admin $admin)
    {
        return view('admin.admin-dashboard.edit-profil', compact('admin'));
    }


    public function update(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' =>'required|string|min:6',
        ]);

        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
            
        $admin->save();
        return redirect ('/admin'); 

    }
}
