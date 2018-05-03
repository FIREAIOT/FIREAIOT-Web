<?php

namespace App\Http\Controllers;

use App\Alarm;
use App\Events\AlarmReceived;
use Illuminate\Http\Request;
use App\Http\Resources\AlarmResource;
use App\Http\Requests\StoreAlarmRequest;

class AlarmController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AlarmResource::collection(
            Alarm::orderBy("created_at", "desc")->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlarmRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlarmRequest $request)
    {
        auth()->user()
            ->alarms()
            ->create($request->only("latitude", "longitude"));

        event(new AlarmReceived($request->latitude, $request->longitude));

        return response()->json("okay", 201);
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
