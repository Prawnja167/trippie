<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HolidayDetail extends Model
{
    protected $fillable=['date_holiday_id','start_time','end_time','price','activity'];

    public function dateHoliday(){
        return $this->belongsTo('App\DateHoliday');
    }
}
