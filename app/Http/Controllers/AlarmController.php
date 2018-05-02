<?php

namespace App\Http\Controllers;

use App\Alarm;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->alarms()->create($request->only("longitude", "latitude"));

        return response()->json("", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function show(Alarm $alarm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alarm $alarm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alarm $alarm)
    {
        //
    }
}
