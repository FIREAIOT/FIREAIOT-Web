<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UAV extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string
     */
    protected $table = 'uavs';

    /**
     * @var array
     */
    protected $casts = [
        "longitude" => "double",
        "latitude"  => "double",
    ];
}
