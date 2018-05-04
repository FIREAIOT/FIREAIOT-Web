<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UAVResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"            => "sgkjsgsgiu4ksgkjhsg",
            "battery"       => 100,
            "location"      => [
                "latitude"  => 0.0,
                "longitude" => 0.0
            ]
        ];
    }
}
