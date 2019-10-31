<?php

namespace Order\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Status label.
     */
    protected $statusLabel = [
        'pending' => 'Pending',
        'pending_payment' => 'Pending Payment',
        'processing' => 'Processing',
        'completed' => 'Completed',
        'canceled' => 'Canceled',
        'closed' => 'Closed',
        'fraud' => 'Fraud'
    ];
    /**
     * Get the order items record associated with the order.
     */
    public function getCustomerFullNameAttribute()
    {
        return $this->customer_first_name . ' ' . $this->customer_last_name;
    }
    /**
     * Returns the status label from status code
     */
    public function getStatusLabelAttribute()
    {
        return $this->statusLabel[$this->status];
    }
    /**
     * Get the order items record associated with the order.
     */
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    /**
     * Get the addresses for the order.
     */
    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

}