<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vehicalfare extends Model
{
    //
use VehicalFareAttribute;

    protected $table='vehical_routes_fairs';
public $timestamps=false;
protected $fillable=['id'];

    public function vehical()
    {

        return $this->hasMany('App\Models\vehicle','id','vehical_id');
    }



    public function route()
    {
        return $this->hasMany('App\Models\route','id','route_id');

    }
}
