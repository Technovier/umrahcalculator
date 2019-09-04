<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\hotel_type;
use App\Models\location;

use App\Models\route;
use App\Models\vehicle;
use Illuminate\Http\Request;
use App\Models\vehicalfare;

class VehicalFareController extends Controller
{
    /**
     * @return \Illuminate\View\View
     *
     */

public function create()
{


return  view('backend.vehicalfare.create')->with('vehicle',vehicle::all())->with('route',route::all());
}

    public function index()
    {
//        dd(vehicalfare::all()->groupBy('route_id')->toArray());


//        return view('backend.vehicalfare.index')->with('vehicalfare',vehicalfare::with('vehical')->with('route')->get());
        return view('backend.vehicalfare.index')->with('vehicalfare',vehicalfare::with('vehical')->with('route')->get())->with('routes',route::all());
    }

    public function edit(Request $request)
    {
        return view('backend.vehicalfare.edit')->with('vehicle',vehicle::all())->with('route',route::all())->with('data',vehicalfare::find($request->id));
    }


    public function updatevehicalfare(Request $request)
    {
//dd($request->routeid);

        vehicalfare::where('id',$request->routeid)->update(['fare'=>$request->fare,'vehical_id'=>$request->vehical_id,'route_id'=>$request->route_id]);

        $vehicle=vehicle::all();

        foreach ($vehicle as $v)
        {
$v2="$v->id";
//dd($request->routeid);
            vehicalfare::where('route_id',$request->routeid)->where('vehical_id',$v->id)->update(['fare'=>$request->$v2 ]);
        }
        return redirect('/admin/vehicalfare/vehicalfare/index');
    }


    public function delete(Request $request)
    {
        vehicalfare::find($request->id)->delete();
        return redirect()->back()->with('success','Item created successfully!');
    }

}
