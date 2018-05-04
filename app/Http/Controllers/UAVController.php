<?php

namespace App\Http\Controllers;

use App\UAV;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UAV  $uAV
     * @return \Illuminate\Http\Response
     */
    public function show(UAV $uAV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UAV  $uAV
     * @return \Illuminate\Http\Response
     */
    public function edit(UAV $uAV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UAV  $uAV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UAV $uAV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UAV  $uAV
     * @return \Illuminate\Http\Response
     */
    public function destroy(UAV $uAV)
    {
        //
    }
}
