<?php

namespace App\Http\Controllers;

use App\UAV;
use App\Events\UAVLocationUpdated;
use App\Http\Requests\UpdateUAVLocationRequest;

class UAVLocationController extends Controller
{
    /**
     * @param UpdateUAVLocationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUAVLocationRequest $request)
    {
        $uav = UAV::where('uuid', $request->uuid)->first();

        $uav->update([
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude
        ]);

        event(new UAVLocationUpdated($uav));

        return response()->json('ok', 200);
    }
}
