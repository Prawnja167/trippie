<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Place;

class IndexController extends Controller
{
    public function index(){
    	$cities = City::all();
    	return view('home',compact('cities'));
    }

    public function city($id){
    	$places = Place::with('City')->where('city_id',$id)->get();
    	$city = City::find($id);
    	return view('city',compact('city','places'));
    }
}