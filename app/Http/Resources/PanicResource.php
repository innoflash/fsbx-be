<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PanicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'panic_type' => $this->panic_type,
            'details' => $this->details,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'created_by' => $this->whenLoaded('user', new UserResource($this->user))
        ];
    }
}
