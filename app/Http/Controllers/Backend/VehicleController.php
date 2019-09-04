<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class DashboardController.
 */
class VehicleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $users=DB::table('vehicals')->get();
        return view('backend.vehicle.vehicle')->with('vehicle',$users);
    }
    public function create(Request $request)
    {
//        dd($request);
        $device = new vehicle();
        $device->name = request('vehical_name');
        $device->seating_capacity = request('seating_capacity');
        $device->save();

        return redirect('/admin/vehicle');
    }
    public function edit(Request $request)
    {
        return view('backend.vehicle.edit_vehicle_modal')->with('vehical_data',vehicle::find($request->vehical_id));
    }
    public  function update(Request $request)
    {

        $this->validate($request,[
            'vehical_name'=>'required',
            'seating_capacity'=>'required',
        ]);

        vehicle::where('id',$request->id)->update(['name'=>$request->vehical_name,'seating_capacity'=>$request->seating_capacity]);


//        Db::table('vehicals') ->where('id',$request->vehical_id)->update(['vehicle_name'=>$request->vehicle_name,'seating_capacity'=>$request->seating_capacity]);

        return Redirect('/admin/vehicle');
    }

    public function destroy(Request $request)
    {
        $users=DB::table('vehicals')->get();

        Db::table('vehicals')->where('id',$request->vehicle_id)->delete();
        Db::table('vehical_routes_fairs')->where('vehical_id',$request->vehicle_id)->delete();


        return Redirect('/admin/vehicle');
    }

}
