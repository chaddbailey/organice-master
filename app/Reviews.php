<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;


class Reviews extends Model
{
       public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:10',
            'rating'=>'required|integer|between:1,5'
        );
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function partner()
    {
        return $this->belongsTo('App\Admin');
    }

    // Scopes
    public function scopeApproved($query)
    {
       	return $query->where('approved', true);
    }

    public function scopeSpam($query)
    {
       	return $query->where('spam', true);
    }

    public function scopeNotSpam($query)
    {
       	return $query->where('spam', false);
    }

    // Attribute presenters
    public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

   
    public function storeReviewForPartners($id, $comment, $rating)
    {
        $partner = Admin::find($id);

        $this->client_id = Auth::user()->id;
        $this->comment = $comment;
        $this->rating = $rating;
        $this->approved = 1;
        $partner->reviews()->save($this);

        // recalculate ratings for the specified product
        $partner->recalculateRating($rating);
    }
}