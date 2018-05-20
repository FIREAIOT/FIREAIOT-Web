<?php

namespace App\Http\Controllers;

use App\Alarm;
use App\Events\AlarmStatusUpdated;
use App\Status;
use App\Events\AlarmReceived;
use App\Events\ActionRequired;
use App\Http\Resources\AlarmResource;
use App\Http\Requests\StoreAlarmRequest;
use App\Http\Requests\UpdateAlarmRequest;

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
        $alarm = auth()->user()
            ->alarms()
            ->create($request->only("latitude", "longitude"));

        event(new AlarmReceived($alarm));
        event(new ActionRequired("goTo", [
            "target" => [
                "id"        => $alarm->id,
                "latitude"  => $request->latitude,
                "longitude" => $request->longitude
            ]
        ]));

        return response()->json("okay", 201);
    }

    /**
     * Update the current status of an alarm.
     *
     * @param UpdateAlarmRequest $request
     */
    public function update(UpdateAlarmRequest $request)
    {
        $status = Status::where("name", $request->status)->first();
        $alarm  = Alarm::where("id", $request->alarm_id)->first();

        $alarm->update([
            "status_id" => $status->id
        ]);

        event(new AlarmStatusUpdated($alarm));
    }
}
