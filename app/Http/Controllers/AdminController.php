<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'status' => null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       //giving the role of a 'admins' to the user
        $user->attachRole(1);
   
        return redirect()->route('admin.create')
                        ->with('success','');
    }

}
