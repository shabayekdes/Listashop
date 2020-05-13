<?php

namespace Order\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'is_guest',
        'order_status',
        'customer_email',
        'customer_first_name',
        'customer_last_name',
        'user_id',
        'grand_total',
        'item_count',
        'error'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'order_status_label'
    ];

    /**
     * Status label.
     */
    protected $statusLabel = [
        1 => 'Pending',
        2 => 'Processing',
        3 => 'Completed',
        4 => 'Canceled',
        5 => 'Closed'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_guest' => 'boolean',
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
    public function getOrderStatusLabelAttribute()
    {
        return $this->statusLabel[$this->order_status];
    }
    /**
     * Get the order items record associated with the order.
     */
    public function products()
    {
        return $this->belongsToMany('Product\Models\Product')->withPivot('quantity', 'total');
    }
    /**
     * Get the addresses for the order.
     */
    public function addresses()
    {
        return $this->hasOne(OrderAddress::class);
    }
    /**
     * Get the addresses for the order.
     */
    public function user()
    {
        return $this->belongsTo('User\Models\User');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y/m/d H:m');
    }
}
