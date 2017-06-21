<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageContent extends Model
{
    protected $table='packagecontent';
	public $timestamps=false;

	protected $fillable=[
	 'id','contentname'
	];

	public function package(){
		return $this->belongsTo('App/Package','id');
	}
}
