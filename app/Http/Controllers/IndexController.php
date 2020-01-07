<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Place;
use App\Holiday;
use App\DateHoliday;

class IndexController extends Controller
{
    public function index(){
		$cities = City::all();
		$trips = Holiday::all();
		$start = [];
		$end = [];
		foreach($trips as $trip) {
			$s = DateHoliday::where('holiday_id', $trip->id)->first();
			$sdate = date_create($s->date);
			$sdate = date_format($sdate,"d F Y");
			array_push($start, $sdate);
			$e = DateHoliday::orderBy('id','desc')->where('holiday_id', $trip->id)->first();
			$edate = date_create($e->date);
			$edate = date_format($edate,"d F Y");
			array_push($end, $edate);
		};
    	return view('home',compact('cities','trips','start','end'));
    }

    public function city($id){
    	$places = Place::with('City')->where('city_id',$id)->get();
		$city = City::find($id);
		// dd($places);
    	return view('city',compact('city','places'));
    }
}