<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nearby extends Model
{
    //

    protected $table='nearby';
    public $timestamps = false;
    protected $fillable = [
        'distance', 'partner_io', 'user_id'
    ];
}
