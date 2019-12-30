<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable=['city_id','name','image','address','category','opening','rating'];
    
    public function placeAttraction(){
        return $this->hasMany('App\PlaceAttraction');
    }
    
    public function city(){
        return $this->belongsTo('App\City');
    }
    
    public function wishList(){
        return $this->hasMany('App\Wishlist');
    }
}
