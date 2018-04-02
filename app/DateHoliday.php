<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateHoliday extends Model
{
    protected $fillable=['date','holiday_id'];

    public function holiday(){
        return $this->belongsTo('App\Holiday');
    }
    public function detailHoliday(){
        return $this->hasMany('App\HolidayDetail');
    }
}
