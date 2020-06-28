<?php

namespace ListaShop\Order\Http\Resources;

use Carbon\Carbon;
use ListaShop\User\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use ListaShop\Product\Http\Resources\ProductResource;
use ListaShop\Customer\Http\Resources\CustomerResource;

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
            'item_count' => $this->item_count,
            'total' => presentPrice($this->grand_total),
            'payment_method_label' => $this->payment_method_label,
            'payment_status_label' => $this->payment_status_label,
            'order_status_label' => $this->order_status_label,
            'order_status' => $this->order_status,
            'order_status' => $this->order_status,
            'products' => ProductResource::collection($this->products),
            'customer' => new CustomerResource($this->customer),
            'address' => $this->address,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
