<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='admins';
    protected $fillable = [
        'name', 'email', 'password', 'address', 'contactperson', 'contactnumber', 'servicetype'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function servicetype()
    {
        return $this->belongsTo('App\ServiceType','servicetype','service_id');
    }

    public function partnerRequest()
    {
        return $this->hasMany('App\Admin', 'client_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Reviews');
    }


    public function recalculateRating($rating)
    {
        $reviews = $this->reviews()->notSpam()->approved();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating,1);
        $this->rating_count = $reviews->count();
        $this->save();
    }

}
