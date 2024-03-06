<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // public static $wrap = 'user';
    public function toArray(Request $request): array
    {

        $images = explode(',', $this->images);
        return [
            "id"=> $this->id,
            'name' => $this->name,
            'price' => number_format($this->price, 2), // Format price with 2 decimals
            'description' => $this->description,
            "place"=> $this->place,
            "place_area"=> $this->place_area,
            "city"=> $this->city,
            "cover"=> $images[0],
            "images"=> $images,
            "rate"=> $this->rate,
            "opening_hours"=> $this->opening_hours,
            "phone_number"=> $this->phone_number,
            "url"=> "https://maps.google.com/?cid=14824246189497236577",
            
        ];
    }
}
