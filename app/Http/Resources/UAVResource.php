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
            "ip"            => $this->ip,
            "uuid"          => $this->uuid,
            "battery"       => $this->battery,
            "isReady"       => $this->isReady,
            "latitude"      => $this->latitude,
            "longitude"     => $this->longitude,
            "altitude"      => $this->altitude,
            "homeLatitude"  => $this->altitude,
            "homeLongitude" => $this->altitude,
            "createdAt"     => $this->created_at->diffForHumans(),
            "updatedAt"     => $this->updated_at->diffForHumans()
        ];
    }
}