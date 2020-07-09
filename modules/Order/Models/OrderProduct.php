<?php

namespace ListaShop\Order\Models;

use ListaShop\Option\Models\Option;
use ListaShop\Option\Models\OptionValue;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    protected $table = 'order_product';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * Get the order record associated with the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * The Option that belong to the Product Option.
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    /**
     * Get all of the posts for the country.
     */
    public function orderOption()
    {
        return $this->hasManyThrough(OrderProductOptionValue::class, OrderProductOption::class);
    }
    /**
     * Get all of the option's values.
     */
    public function values()
    {
        return $this->belongsToMany(OptionValue::class, 
            'order_product_option',
            'order_product_id',
            'option_value_id'
        )->withPivot('price');
    }

    /**
     * Get all of the option's values.
     */
    public function options()
    {
        return $this->belongsToMany(Option::class, 
            'order_product_option',
            'order_product_id',
            'option_id'
        )->withPivot('price');
    }

}
