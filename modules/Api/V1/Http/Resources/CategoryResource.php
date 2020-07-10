<?php

namespace ListaShop\Api\V1\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use ListaShop\Api\V1\Http\Resources\ProductResource;

class CategoryResource extends JsonResource
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
            'position' => $this->position,
            'image' => $this->image,
            'status' => $this->status,
            'popular' => $this->popular,
            'name' => $this->name,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'products' => ProductResource::collection($this->products)
        ];
    }
}
