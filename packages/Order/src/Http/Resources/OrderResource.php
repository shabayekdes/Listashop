<?php

namespace Order\Http\Resources;

use User\Http\Resources\UserResource;
use Product\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'customer_name' => $this->customer_full_name,
            'item_count' => $this->item_count,
            'total' => presentPrice($this->grand_total),
            'payment_gateway' => $this->payment_gateway,
            'status' => $this->status,
            'is_guest' => $this->is_guest,
            'products' => ProductResource::collection($this->products),
            'user' => new UserResource($this->user),
            'date' => $this->created_at
        ];
    }
}