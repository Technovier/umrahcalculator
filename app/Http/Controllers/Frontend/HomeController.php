<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {


        if ($request->package_type == 4)
        {
            //3star
            $makkah_hotel_db=DB::table('hotel')->where('location_id',1)->where('type_id',2)->get();
            $madina_hotel_db=DB::table('hotel')->where('location_id',2)->where('type_id',2)->get();



            $room_type=DB::table('room_type')
                ->where('type_name','<>','sharing')
                ->where('type_name','<>','Sharing')
                ->get();
        }
        else
        {
            //economy
            $makkah_hotel_db=DB::table('hotel')->where('location_id',1)->where('type_id',1)->get();
            $madina_hotel_db=DB::table('hotel')->where('location_id',2)->where('type_id',1)->get();

            $room_type=DB::table('room_type')
                ->where('type_name','<>','quint')
                ->where('type_name','<>','Quint')
                ->get();

        }

//        dd($makkah_hotel_db);
        $ziarat_price=DB::table('ziarat')->pluck('price');
        $routes=DB::table('routes')->orderBy('priority')->get();
        $vehical=DB::table('vehicals')->get();
        $packages=DB::table('packages')->get();





        return view('frontend.index')
            ->with('packagedays',$request->package_days)
            ->with('makkah_hotel_db',$makkah_hotel_db)
            ->with('packages',$packages)
            ->with('room_type',$room_type)
            ->with('vehical',$vehical)
            ->with('routes',$routes)
            ->with('ziarat_price',$ziarat_price[0])
            ->with('madina_hotel_db',$madina_hotel_db);
    }



    public function index1()
    {
        $makkah_hotel_db=DB::table('hotel')->where('location_id',1)->get();
        $madina_hotel_db=DB::table('hotel')->where('location_id',2)->get();
        $ziarat_price=DB::table('ziarat')->pluck('price');
        $routes=DB::table('routes')->get();
        $vehical=DB::table('vehicals')->get();
        $room_type=DB::table('room_type')->get();
        $packages=DB::table('packages')->get();
        return view('frontend.index1')->with('makkah_hotel_db',$makkah_hotel_db)->with('packages',$packages)->with('room_type',$room_type)->with('vehical',$vehical)->with('routes',$routes)->with('ziarat_price',$ziarat_price[0])->with('madina_hotel_db',$madina_hotel_db);


    }



    public function gethotels(Request $request)
    {

return response()->json(DB::table('hotel')->get());
    }
}
