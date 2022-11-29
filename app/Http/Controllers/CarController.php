<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;

class CarController extends Controller
{


    function rentacar(Request $request)
    {


        car::create([
            'vehicletype' => $request->option1,
            'vehiclebrand' => $request->option2,
            'vehiclemodel' => $request->option3,
            'email' => $request->email,
            'rentnoofdays' => $request->rentnoofdays,
            'totalrent' => $request->totalrent
        ]);

        return redirect('/');
    }

    function deleteitems(car $car, $id)
    {
        $row = car::where('id', $id)->where('email', auth()->user()->email)->first();
        $row->delete();
        return back();
    }

    public function edititems($id)
    {
        $data = car::where('id', $id)->where('email', auth()->user()->email)->first();
        return view('edit', compact('data'));
    }


    public function updateitems(Request $request)
    {
        $obj = car::find($request->id);
        $obj->vehicletype = $request->option1;
        $obj->vehiclebrand = $request->option2;
        $obj->vehiclemodel = $request->option3;
        $obj->email = $request->email;
        $obj->rentnoofdays = $request->rentnoofdays;
        $obj->totalrent = $request->totalrent;
        $obj->update();

        return redirect('/');
    }
}
