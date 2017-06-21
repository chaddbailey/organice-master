<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = 'servicetype';

    protected $primaryKey = 'service_id';

    public function admin(){
    	return $this->hasMany('App/Admin', 'servicetype');
    }
}
