<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\hotel_type;
use App\Models\location;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Hotel;
use DB;
/**
 * Class DashboardController.
 */
class RoomController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
            public function index()
            {
                return view('backend.hotel.index')->with('hotel_with_rooms',Hotel::with('rooms')->with('location')->with('hoteltype')->get());
            }
            public function create()
            {
            return view('backend.hotel.createroom')->with('roomtype',DB::table('room_type')->get());
            }
            public function edit()
            {
                return view('backend.hotel.editroom')->with('Room',Room::find(request()->room_id))->with('Roomtype',DB::table('room_type')->get());
            }
            public function update(Request $request)
            {
                return view('backend.hotel.edit')->with('hotel',Hotel::find(request()->id));
            }
            public function updatesmall(Request $request)
            {
                        Room::where('id',$request->room_id)->update(['price'=>$request->price,'room_type'=>$request->roomtype]);
            }
            public function delete(Request $request)
            {
                Room::find(request()->room_id)->delete();
                return redirect()->back()->with('message','Success');
            }
}
