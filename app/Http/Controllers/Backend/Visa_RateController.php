<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class DashboardController.
 */
class Visa_RateController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users=DB::table('visa_rates')->get();

        return view('backend.auth.user.visa_rate')->with('users',$users);
    }


    public  function update(Request $request)
    {

        Db::table('visa_rates') ->where('id', 1)->update(['child'=>$request->child,'infant'=>$request->infant,'adult'=>$request->adult,'updated_at'=>Carbon::now('(PKT) + 0500 UTC')->format('Y-m-d H:i:s')]);


        return Redirect('/admin/visa_rate')->with('message', 'Record Update Successfully!');;
    }
}
