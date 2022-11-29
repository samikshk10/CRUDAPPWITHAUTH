<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use Illuminate\Support\Facades\Auth;


class homeController extends Controller
{
    function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $value = car::where('vehiclebrand', 'LIKE', "%$search%")->where('email', Auth::user()->email)->get();
        } else {

            $value = car::where('email', Auth::user()->email)->get();
        }
        return view('index', compact('value', 'search'));


        // return view('index', ['data' => car::where('email', Auth::user()->email)->first()]);
        // return  car::select('email')->get();


        // return car::all();
    }

    function rentacar()
    {
        return view('rentacar');
    }

    function login()
    {
        return view('login');
    }
    function signup()
    {
        return view('register');
    }
}
