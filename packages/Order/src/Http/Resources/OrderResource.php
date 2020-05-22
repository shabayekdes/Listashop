<?php

namespace Order\Http\Resources;

use User\Http\Resources\UserResource;
use Product\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
            'key' => $this->key,
            'customer_name' => $this->customer_full_name,
            'item_count' => $this->item_count,
            'total' => presentPrice($this->grand_total),
            'payment_method_label' => $this->payment_method_label,
            'payment_status_label' => $this->payment_status_label,
            'order_status_label' => $this->order_status_label,
            'order_status' => $this->order_status,
            'order_status' => $this->order_status,
            'is_guest' => $this->is_guest,
            'products' => ProductResource::collection($this->products),
            'user' => new UserResource($this->user),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
