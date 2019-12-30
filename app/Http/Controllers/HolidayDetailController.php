<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DateHoliday;
use App\HolidayDetail;

class HolidayDetailController extends Controller
{
    public function storeHolidayPlan(Request $request) {
        $start = explode(",",$request->start);
        $end = explode(",",$request->end);
        $cost = explode(",",$request->cost);
        $place_id = explode(",",$request->place);
        $date = $request->date;
        
        for ($i=0; $i<count($start); $i++) {
            $detail = new HolidayDetail();
            $detail->date_holiday_id = $date;
            $detail->start_time = $start[$i];
            $detail->end_time = $end[$i];
            $detail->price = $cost[$i];
            $detail->activity = $place_id[$i];
            $detail->save();
        }

        return redirect('/list');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $list)
    {
        $holiday = DateHoliday::find($request->date);
        $detail = $holiday->detailHoliday()->create($request->all());
        return redirect('/list/'.$list);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
