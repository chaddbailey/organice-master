<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientMobile extends Model
{
    protected $primaryKey = 'clientmob_id';
    protected $table= 'clientmobile';
    public $timestamps = false;
}
