<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientLatLng extends Model
{
    //
     protected $table='client_latlong';
    public $timestamps = false;
    protected $fillable = [
        'c_id', 'lat', 'lng',
    ];
}
