<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Place;
use App\Wishlist;
use App\User;
use DB;
use Auth;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $places = Place::with('city')->with('wishlist')->get();
        $cust = User::with('wishlist')->get();
        $count = 0;
        $d = User::with('wishlist')->where('id',Auth::user()->id)->get();
        for($i = 0 ; $i < count(Place::all()) ; $i++){

            for($j = 0 ; $j < count($d[0]->wishlist) ; $j++){

                if($places[$i]->id == $d[0]->wishlist[$j]->place_id){
                    $places[$i]['status'] = 1;
                    break;
                }
            }
        }
        // dd(Auth::user()->id == $places[0]->wishlist[0]->user_id);
        
        return view('addPlace',compact('cities','places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $file->storeAs('public/objects/',$file->getClientOriginalName());
        Place::create($request->all());
        return redirect('/place');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        $recs = array();
        for($i = $id ; $i < ($id+3) ; $i++){
            $recs[$i] = Place::find($i+1);
        }
        $isWishlisted = false;
        if (Auth::check()) {
            $temp = Wishlist::where('user_id', Auth::user()->id)->where('place_id',$place->id)->first();
            if ($temp) {
                $isWishlisted = true;
            }
        }
        
        return view('place',compact('place','recs','isWishlisted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
