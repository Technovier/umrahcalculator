<?php

namespace App\Http\Controllers\Backend;

use App\Models\hotelroom;
use App\Http\Controllers\Controller;
use App\Models\hotel_type;
use App\Models\location;
use Illuminate\Http\Request;
use App\Models\Hotel;
use DB;
/**
 * Class DashboardController.
 */
class HotelController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if ($request->location==1)
        {
            return view('backend.hotel.index')->with('hotel_with_rooms',Hotel::where('location_id',1)->with('rooms')->with('location')->with('hoteltype')->orderBy('type_id')->get());

        }
        elseif($request->location==2)
        {
            return view('backend.hotel.index')->with('hotel_with_rooms',Hotel::where('location_id',2)->with('rooms')->with('location')->with('hoteltype')->orderBy('type_id')->get());

        }
        else
        {return view('backend.hotel.index')->with('hotel_with_rooms',Hotel::with('rooms')->with('location')->with('hoteltype')->orderBy('type_id')->get());
        }
         }


    public function edit()
    {
        return view('backend.hotel.edit')->with('hotel',Hotel::find(request()->id))->with('location',location::all())->with('hoteltype',hotel_type::all());

    }

    public function create(Request $request)
    {

        $device = new Hotel();
        $device->name = request('name');
        $device->location_id = request('hotellocation');
        $device->type_id = request('hoteltype');
        $device->distance = request('distance');
        $device->save();

        $room_types=DB::table('room_type')->get();

        foreach ($room_types as $rt)
        {

            if ($request->has($rt->id))
            {
                $r="$rt->id";
                hotelroom::updateOrCreate(['hotel_id' => $device->id, 'room_type' => $rt->id] , ['price' => $request->$r] );


            }
        }
        return redirect()->route('admin.hotel.index')->with('message','New Hotel Added Successfully!');

    }

    public  function  create2(){

        return view('backend.hotel.create')->with('location',location::all())->with('hoteltype',hotel_type::all());
    }
    public function update(Request $request)
    {
        Hotel::where('id',$request->hotel_id)->update(['name'=>$request->name,'location_id'=>$request->hotellocation,'type_id'=>$request->hoteltype,'distance'=>$request->distance]);

        $room_types=DB::table('room_type')->get();

        foreach ($room_types as $rt)
        {

            if ($request->has($rt->id))
            {
                $r="$rt->id";
//        dd($request->$r);
//        dd($rt->id);
//hotelroom::updateOrCreate(['hotel_id'=>$request->hotel_id,'room_type'=>$rt->id,'price'=>$request->$r]);
                hotelroom::updateOrCreate(['hotel_id' => $request->hotel_id, 'room_type' => $rt->id] , ['price' => $request->$r] );


            }
        }
        return redirect()->back();

    }

    public function delete()
    {
        Hotel::where('id',request()->id)->delete();
        return redirect()->back()->with('message','Hotel Deleted Successfully');
    }
}
