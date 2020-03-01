<?php

namespace Option\Http\Resources;

use Product\Http\Resources\ProductFlatResource as ProductFlat;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return paren::toArray();
    }
}
