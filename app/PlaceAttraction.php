<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceAttraction extends Model
{
    protected $fillable=['place_id','name','cost','time','image','rating'];
    
    public function place(){
        return $this->belongsTo('App\Place');
    }
}
