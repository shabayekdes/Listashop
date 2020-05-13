<?php

namespace Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    /**
     * Get the order record associated with the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
