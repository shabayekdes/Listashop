<?php

namespace Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductFlatResource extends JsonResource
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
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'thumbnail' => $this->thumbnail != null ? url("/storage//". $this->thumbnail) : null,
            'price' => $this->price,
            'cost' => $this->cost,
            'status' => $this->status,
            'quantity' => $this->quantity,
            'description' => $this->description,
        ];
    }
}