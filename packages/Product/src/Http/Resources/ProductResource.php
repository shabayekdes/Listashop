<?php

namespace Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'slug' => $this->slug,
            'thumbnail' => $this->thumbnail != null ? url("/img/products/". $this->thumbnail) : null,
            'price' => $this->price,
            'cost' => $this->cost,
            'categories_id' => $this->categories_id,
            'status' => $this->status
        ];
    }
}
