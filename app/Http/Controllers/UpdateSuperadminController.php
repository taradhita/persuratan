<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Superadmin;
use Illuminate\Support\Facades\Hash;

class UpdateSuperadminController extends Controller
{
    public function edit(Superadmin $superadmin)
    {
        return view('superadmin.superadmin-dashboard.edit-profil', compact('superadmin'));
    }


    public function update(Request $request, Superadmin $superadmin)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' =>'required|string',
        ]);

        $superadmin->username = $request->username;
        $superadmin->password = Hash::make($request->password);
            
        $superadmin->save();
        return redirect ('/superadmin'); 

    }
}
