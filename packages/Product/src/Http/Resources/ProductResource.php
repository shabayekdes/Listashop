<?php

namespace Product\Http\Resources;

use Product\Http\Resources\ProductFlatResource as ProductFlat;
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
            'slug' => $this->slug,
            'categories_id' => $this->categories_id,
            'status' => $this->status,
            'details' => $this->flat == null ? "" : new ProductFlat($this->flat)
        ];
    }
}
