<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlarmResource extends JsonResource
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
            'id'        => $this->id,
            'user'      => $this->user->name,
            'longitude' => $this->longitude,
            'latitude'  => $this->latitude,
            'status'    => $this->status->name,
            'createdAt' => $this->created_at->diffForHumans()
        ];
    }
}
