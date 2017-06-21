<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReqUsers extends Model
{
    protected $table = 'requsers';
    protected $primaryKey = 'id';
    public $timestamps=false;
}
