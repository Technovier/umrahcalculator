<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiyalController extends Controller
{
    //

    public function index()
    {
        $saudi = DB::table('rayal_rate')->value('rate');

        if($saudi!=null)
        {
            return view('backend.Riyal_Rate.Riyal')->with('users',$saudi);

        }
        else{
            return view('backend.Riyal_Rate.Riyal')->with('users',"0");
        }

    }




    public  function update(Request $request)
    {

        DB::table('rayal_rate')->update(['rate'=>$request->Riyal_rate,'updated_at'=>Carbon::now('(PKT) + 0500 UTC')->format('Y-m-d H:i:s')]);
        return redirect()->back();

    }
}
