<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hotelroom extends Model
{
    //
    protected $table='hotel_room';

    protected $fillable=['hotel_id','room_type','price'];
    public $timestamps=false;
}
