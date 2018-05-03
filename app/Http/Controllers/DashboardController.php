<?php

namespace App\Http\Controllers;

use App\Alarm;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("dashboard.index", ["alarms" => Alarm::all()]);
    }
}
