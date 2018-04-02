<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DateHoliday;
use App\Holiday;
use App\User;
use Auth;

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
                $holidays[($x-1)]['start'] = $y[($x-1)][0]->date;
                $holidays[($x-1)]['end'] = $y[($x-1)][(count($y[($x-1)])-1)]->date;
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
        $request->file('image')->move('../public/images/',$holiday['image']);
        $holiday=$user->holiday()->create([
            'title'=>$request['title'],
            'cost'=>$request['cost'],
            'image'=>$request['image']
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
        // $holiday['start'] = $holidayDate[0]['date'];
        // $holiday['end'] = $holidayDate[count($holidayDate)-1]['date'];
        $holiday['date'] = $holidayDate;
        return view('plan',compact('holiday'));
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
