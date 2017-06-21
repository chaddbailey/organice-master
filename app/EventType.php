<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = 'event';

    protected $primaryKey = 'event_id';

    public function client(){
    	return $this->belongsTo('App/Eventtype', 'event');
    }
}
