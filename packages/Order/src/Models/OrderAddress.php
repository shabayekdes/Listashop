<?php

namespace Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $table = 'order_addresses';

    protected $fillable = ['user_id','order_id','first_name','last_name','email','address1','address2','country','state','city','postcode','phone'];

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