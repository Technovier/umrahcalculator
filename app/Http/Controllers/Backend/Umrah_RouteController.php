<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\vehicalfare;
use App\Models\vehicle;
use App\Models\route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class DashboardController.
 */
class Umrah_RouteController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $routes=DB::table('routes')->get();


        return view('backend.routes.route')->with('users',$routes);

    }
    public function create(Request $request)
    {

      return view('backend.routes.create_route');

    }

    public function priorities()
    {

        $routes=DB::table('routes')->get();


        return view('backend.routes.priority')->with('users',$routes);

    }

    public function store(Request $request)
    {

$obj=new route();
$obj->route=$request->Route_name;
$obj->save();

$vehicle= vehicle::all();
foreach ($vehicle as $v)
{
vehicalfare::insert(['vehical_id'=>$v->id,'route_id'=>$obj->id,'fare'=>0]);
}
return redirect('/admin/Vehicals_Routes');
    }
    public function edit(Request $request)
    {
        return view('backend.routes.update_route')->with('route_data',route::find($request->route_id));

    }

    public  function update(Request $request)
    {
//        dd($request);

        DB::table('routes')->where('id',$request->id)->update(['route'=>$request->route_name]);

        return Redirect('/admin/Vehicals_Routes');


    }

    public function destroy(Request $request)
    {
        $users=DB::table('routes')->get();

        Db::table('routes')->where('id',$request->route_id)->delete();
        Db::table('vehical_routes_fairs')->where('route_id',$request->route_id)->delete();

        return Redirect('/admin/Vehicals_Routes')->with('errormessage','Route Deleted');
    }


}
