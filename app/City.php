<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['name','image'];
    
    public function place(){
        return $this->hasMany('App\Place');
    }
}
