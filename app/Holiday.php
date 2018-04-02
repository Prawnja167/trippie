<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable=['user_id','title','image','cost'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function dateHoliday(){
        return $this->hasMany('App\DateHoliday');
    }
}
