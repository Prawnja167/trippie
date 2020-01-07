<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HolidayDetail;
use App\DateHoliday;
use App\Holiday;
use App\User;
use Auth;
use DB;
use App\Wishlist;
use App\Place;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(Auth::user()->id);
        $holidays = $user->holiday()->get();
        $y = [];
        $z = array($holidays);
        
        if(count($holidays) > 0){
            for($x = 1 ; $x <= count($holidays) ; $x++){
                $dateHoliday = Holiday::find($z[0][$x-1]->id);
                $y[($x-1)] = $dateHoliday->dateHoliday()->get();
                $holidays[($x-1)]['start'] = date_create($y[($x-1)][0]->date);
                $holidays[($x-1)]['start'] = date_format($holidays[($x-1)]['start'],"d F");
                $holidays[($x-1)]['end'] = date_create($y[($x-1)][(count($y[($x-1)])-1)]->date);
                $holidays[($x-1)]['end'] = date_format($holidays[($x-1)]['end'],"d F");
            }
        }
        return view('holiday',compact('holidays'));
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
        // Holiday::with('user')->create($request->all());
        $user=User::find(Auth::user()->id);
       
        $holiday=$request->except('image');
        $holiday['image']=$request->file('image')->getClientOriginalName();
        $request->file('image')->move('../public/Images/trip/',$holiday['image']);
        $holiday=$user->holiday()->create([
            'title'=>$request['title'],
            'cost'=>$request['cost'],
            'image'=>$holiday['image']
        ]);
        $holidayFind = Holiday::find($holiday['id']);

        $start = $request['start_date'];
        $end = $request['end_date'];
        $calc = (substr($end , -2)) - (substr($start, -2));
        $date = [];
        $date[0] = $request['start_date'];
        $holidays = $holidayFind->dateHoliday()->create([
            'date' => $date[0]
        ]);
        for ($x = 1; $x <= $calc; $x++) {
            $date[$x] =  strtotime("+1 day", strtotime($date[($x-1)]));
            $date[$x] = date("Y-m-d", $date[$x]);
            $holidays = $holidayFind->dateHoliday()->create([
                'date' => $date[$x],
            ]);
        } 
        return redirect('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = Holiday::find($id);
        $holidayDate = Holiday::find($id)->dateHoliday()->get();
        $holiday['date'] = $holidayDate;

        for($x = 0 ; $x < count($holiday['date']) ; $x++){
            $holiday['date'][$x]['date'] = date_create($holiday['date'][$x]['date']);
            $holiday['date'][$x]['date'] = date_format($holiday['date'][$x]['date'],"d F Y");
        }
        
        $holiday['start'] = $holiday['date'][0]['date'];
        $holiday['end'] = $holiday['date'][count($holidayDate)-1]['date'];
        
        
        // $activities = DB::table('holidays')
        //             ->join('date_holidays','holidays.id','=','date_holidays.holiday_id')
        //             ->join('holiday_details','date_holidays.id','=','holiday_details.date_holiday_id')
        //             ->where('holiday_id',$id)
        //             ->where('user_id',Auth::user()->id)
        //             ->get();

        $wishlists = DB::table('wishlists')
        ->join('places','places.id','=','wishlists.place_id')
        ->where('user_id',Auth::user()->id)
        ->get();

        $activities = HolidayDetail::all();
        $places = [];
        foreach($activities as $a) {
            $p = Place::find($a->activity);
            array_push($places, $p);
        }
        // dd($places);
        // dd($activities);
        
        return view('plan',compact('holiday','activities','places','wishlists'));
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
        Holiday::find($id)->delete();
        return redirect('list');
    }
}
