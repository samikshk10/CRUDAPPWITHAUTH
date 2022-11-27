<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Contracts\Session\Session;

class MainController extends Controller
{
    function registeruser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:cruds',
            'password' => 'required|min:8',

        ]);
        Crud::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login');
    }



    public function loginuser(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', $req->email);
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
