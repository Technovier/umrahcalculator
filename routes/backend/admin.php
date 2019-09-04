<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ZiaratController;
use App\Http\Controllers\Backend\RiyalController;
use App\Http\Controllers\Backend\HotelController;
use App\Http\Controllers\Backend\RoomController;
use App\Models\Room;
use Illuminate\Http\Request;
use function foo\func;

// All route names are prefixed with 'admin.'.

Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/ziarat', [ZiaratController::class, 'index'])->name('ziarat');
Route::get('/ziarat_update', 'ZiaratController@update')->name('Update_Ziarat');
Route::get('/visa_rate', 'Visa_RateController@index')->name('visa_rate');
Route::get('/Update_visa_rate', 'Visa_RateController@update')->name('Update_visa_rate');

Route::get('/vehicle', 'VehicleController@index')->name('vehicle');

Route::get('/Insert_Vehicles', 'VehicleController@create')->name('createvehicle');

Route::get('/Update_Vehicle/{vehical_id}', 'VehicleController@edit')->name('update_vehicle');

Route::get('/Delete_Vehicle/{vehicle_id}','VehicleController@destroy')->name('delete_vehicle');

 Route::put('/saveupdatedvehicaldata/{id}','VehicleController@update')->name('updatevehical');

Route::get('/Riyal', [RiyalController::class, 'index'])->name('riyal');
Route::get('/Update_Riyal_Rate', 'RiyalController@update')->name('Update_Riyal');


Route::group(['prefix' => 'hotel', 'as' => 'hotel.'], function () {
    Route::get('/hotelmanagement',[HotelController::class, 'index'])->name('index');
    Route::get('/hotelmanagement/create',[HotelController::class, 'create'])->name('hotel_create');
    Route::get('/hotelmanagementedit/{id?}',[HotelController::class, 'edit'])->name('edit');
    Route::get('/hotelmanagementupdate/{id?}',[HotelController::class, 'update'])->name('update');
    Route::delete('/hotelmanagementdelete/{id?}',[HotelController::class, 'delete'])->name('destroy');
    Route::get('/hotelmanagementdelete/{id?}',function (Request $request){
        $check=Room::where('hotel_id',$request->hotel_id)->where('room_type',$request->type_id)->get();

        if (!isset($check))
        {

            $obj= new \App\Models\Room();
            $obj->hotel_id=$request->hotel_id;
            $obj->room_type=$request->type_id;
            $obj->price=$request->price;
            $obj->save();
            return redirect('/admin/hotel/hotelmanagement');

        }
        else
        {
            return redirect('/admin/hotel/hotelmanagement')->with('errormessage','Room with this type already exists');
        }
    })->name('room_save');
});


Route::get('/savepriority', function(   )
{



    $loop=DB::table('routes')->get();

    foreach ($loop as $l)
    {
        $value='priority_'.$l->id;
        DB::table('routes')->where('id',$l->id)->update(['priority'=>request()->$value]);

    }

    return redirect()->back();
})->name('savepriority');



Route::get('/Vehicals_Routes', 'Umrah_RouteController@index')->name('vehicle_route');
Route::get('/Delete_Route/{route_id}','Umrah_RouteController@destroy')->name('delete_route');
Route::get('/Edit_Route/{route_id}','Umrah_RouteController@edit')->name('edit_route');
Route::put('/Save_Update_Vehical_Data/{id}','Umrah_RouteController@update')->name('updateroute');

Route::post('/savevehicalroutefare',function (Request $request){

$obj= new App\Models\vehicalfare();
$obj->vehical_id=$request->vehical_id;
$obj->route_id=$request->route_id;
$obj->fare=$request->fare;
$obj->save();
return redirect('/admin/vehicalfare/vehicalfare/index');
//    dd($request->all());
})->name('save_fare');


Route::get('/vehicalfare/index','VehicalFareController@index')->name('index');
Route::get('/vehicalfare/delete/{id}','VehicalFareController@delete')->name('delete');
Route::get('/Insert_Route', 'Umrah_RouteController@create')->name('create_route');


Route::get('/Route_Priority', 'Umrah_RouteController@priorities')->name('route_priority');


Route::get('/save_Route', 'Umrah_RouteController@store')->name('save_route');


Route::group(['prefix' => '/vehicalfare', 'as' => 'vehicalfare.'], function () {
    Route::get('/vehicalfare/index','VehicalFareController@index')->name('index');

    Route::get('/vehicalfare/update','VehicalFareController@updatevehicalfare')->name('updatevehicalfare');

    Route::get('/vehicalfare/edit/{id}','VehicalFareController@edit')->name('edit');

    Route::delete('/vehicalfare/delete/{id}','VehicalFareController@delete')->name('delete');

});

Route::get('/hotel/create','HotelController@create2')->name('createhotel');
Route::get('/vehiclefare/create','VehicalFareController@create')->name('createvehicalfare');

Route::group(['prefix' => 'hotel/room/', 'as' => 'hotel.room.'], function () {

    Route::get('room/create/{hotel_id}',[RoomController::class, 'create'])->name('create');
    Route::get('/edit/{room_id}',[RoomController::class, 'edit'])->name('edit');
    Route::get('/deleteroom/{room_id}',[RoomController::class, 'delete'])->name('deleteroom');
    Route::get('updateroom',[RoomController::class, 'update'])->name('update');
    Route::get('updateroom',[RoomController::class, 'updatesmall'])->name('updatesmall');

});

Route::get('/roomfare/{hotel?}/{room?}',function (){

    $price = DB::table('hotel_room')->where('hotel_id',request()->hotel)->where('room_type',request()->room)->value('price');
    return response()->json($price);
})->name('roomfare');
