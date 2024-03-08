<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProudctResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            "id"=>$this->id,
            "product_name"=>$this->title,
            "desc"=>$this->desc,
            "category_id"=>$this->category_id,
            "user_id"=>$this->user_id,
            "price"=>$this->price,
            "image"=>asset('storage')."/".$this->image,
            // "category_name"=>$this->category_name,





        ];
    }
}
