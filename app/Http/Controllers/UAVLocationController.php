<?php

namespace App\Http\Controllers;

use App\UAV;
use App\Http\Requests\UpdateUAVLocationRequest;

class UAVLocationController extends Controller
{
    /**
     * @param UpdateUAVLocationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUAVLocationRequest $request)
    {
        $uav = UAV::where("uuid", $request->uuid)->first();

        $uav->update([
            "latitude"  => $request->latitude,
            "longitude" => $request->longitude
        ]);

        return response()->json("ok", 200);
    }
}
