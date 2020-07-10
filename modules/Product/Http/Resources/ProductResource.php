<?php

namespace ListaShop\Product\Http\Resources;

use ListaShop\Product\Http\Resources\ProductFlatResource as ProductFlat;
use Illuminate\Http\Resources\Json\JsonResource;
use ListaShop\Option\Http\Resources\OptionResource;

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
            'category_id' => $this->category_id,
            'status' => $this->status,
            'name' => $this->name,
            'thumbnail' => $this->thumbnail != null ? url($this->thumbnail) : null,
            'price' => $this->price,
            'cost' => $this->cost,
            'status' => $this->is_active,
            'qty' => $this->qty,
            'type' => $this->type,
            'description' => $this->description,
            'images' => $this->images,

            'options' => OptionResource::collection($this->options->load('values'))

            // 'options' => $this->options->load('values')
        ];
    }
}
