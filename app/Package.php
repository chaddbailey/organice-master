<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	protected $table='package';
	public $timestamps=false;

	protected $fillable=[
	'packagename'
	];
    
}
