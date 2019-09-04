<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
/**
 * Class DashboardController.
 */
class ZiaratController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = DB::table('ziarat')->value('price');

        if($users!=null)
    {
        return view('backend.ziarat.ziarat')->with('users',$users);

    }
     else{
         return view('backend.ziarat.ziarat')->with('users',"0");
         }

    }




    public  function update(Request $request)
    {

        DB::table('ziarat')->update(['price'=>$request->Ziarat_Price,'updated_at'=>Carbon::now('(PKT) + 0500 UTC')->format('Y-m-d H:i:s')]);
        return redirect()->back();

    }
}
