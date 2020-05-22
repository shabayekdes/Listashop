<?php

namespace Order\Models;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected $fillable = [
    //     'key',
    //     'is_guest',
    //     'order_status',
    //     'customer_email',
    //     'customer_first_name',
    //     'customer_last_name',
    //     'user_id',
    //     'grand_total',
    //     'item_count',
    //     'error'
    // ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'order_status_label',
        'payment_method_label',
        'payment_status_label',
    ];

    /**
     * Order status label.
     */
    protected $orderStatusLabel = [
        1 => 'Pending',
        2 => 'Processing',
        3 => 'Completed',
        4 => 'Canceled'
    ];
    /**
     * Payment method label.
     */
    protected $paymentMethodLabel = [
        1 => 'Cash On Delivery',
        2 => 'Stripe',
        3 => 'Paypal'
    ];
    /**
     * Payment status label.
     */
    protected $paymentStatusLabel = [
        1 => 'Pending',
        2 => 'Paid',
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
     * Returns the order status label from status code
     */
    public function getOrderStatusLabelAttribute()
    {
        return $this->orderStatusLabel[$this->order_status];
    }
    /**
     * Returns the payment method label from status code
     */
    public function getPaymentMethodLabelAttribute()
    {
        return $this->paymentMethodLabel[$this->payment_method];
    }
    /**
     * Returns the payment method label from status code
     */
    public function getPaymentStatusLabelAttribute()
    {
        return $this->paymentStatusLabel[$this->payment_status];
    }
    /**
     * Set the payment method.
     *
     * @param  string  $value
     * @return void
     */
    public function setPaymentMethodAttribute($value)
    {
        $method = [
            'cod' => 1,
            'stripe' => 2,
            'paypal' => 3
        ];

        $this->attributes['payment_method'] = $method[$value];
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
