<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $table = 'order_address';

    /**
     * Get of the customer fullname.
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the customer record associated with the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}