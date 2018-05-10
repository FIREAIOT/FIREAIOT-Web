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
}
