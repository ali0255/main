<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'dec' => $this->dec,
            'befor_dec' => $this->befor_dec,
            'start_time' => $this->start_time,
            'Mabdah' => $this->Mabdah,
            'Maqsad' => $this->Maqsad,
            'price' => $this->price,
            'user' => [
                'name' => $this->user->name
            ]
        ];
    }
}
