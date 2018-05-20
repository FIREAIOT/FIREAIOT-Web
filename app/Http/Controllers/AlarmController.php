<?php

namespace App\Http\Controllers;

use App\Alarm;
use App\Events\AlarmReceived;
use App\Events\ActionRequired;
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
        $alarm = auth()->user()
            ->alarms()
            ->create($request->only("latitude", "longitude"));

        event(new AlarmReceived($request->latitude, $request->longitude));
        event(new ActionRequired("goTo", [
            "target" => [
                "id"        => $alarm->id,
                "latitude"  => $request->latitude,
                "longitude" => $request->longitude
            ]
        ]));

        return response()->json("okay", 201);
    }
}
