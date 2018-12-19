<?php

namespace App\Http\Controllers;

use App\UAV;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\UAVResource;

class UAVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return UAVResource::collection(
            UAV::get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlarmRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['home_latitude', 'home_longitude']);
        $data['uuid'] = (string) Str::uuid();

        $alarm = auth()->user()
            ->uavs()
            ->create($data);

        return response()->json('okay', 201);
    }
}
