<?php

Route::post("/alarms", "AlarmController@store")->middleware("auth:api");