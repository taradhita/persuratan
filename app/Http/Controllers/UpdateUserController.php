<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    public function edit(User $user)
    {
        return view('user-dashboard.edit-profil', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' =>'required|string',
        ]);

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
            
        $user->save();
        return redirect ('/user'); 

    }
}
