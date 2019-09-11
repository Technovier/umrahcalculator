<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HotelAttribute;
    //
    protected $table='hotel';
    public $timestamps=false;
    protected $fillable=['name'];
    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }


    public function location()
    {
        return $this->hasMany('App\Models\location','id','location_id');
    }


    public function hoteltype()
    {
        return $this->hasMany('App\Models\hotel_type','id','type_id');
    }


}
