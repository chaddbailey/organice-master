<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    protected $table = 'request';
    protected $fillable = [
        'client_id',
        'partner_id',
        
    ];
    
    protected $primaryKey = 'id';
    public $timestamps = false;

     public function clientRequest()
    {
        return $this->belongsTo('App\User', 'client_id', 'id');
    }

    public function partnerRequest()
    {
        return $this->belongsTo('App\Admin', 'partner_id', 'id');
    }
}
