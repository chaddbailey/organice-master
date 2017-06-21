<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerLatLng extends Model
{
    //
     protected $table='partner_latlong';
    public $timestamps = false;
    protected $fillable = [
        'p_id', 'lat', 'lng'
    ];
}
