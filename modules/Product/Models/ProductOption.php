<?php

namespace ListaShop\Product\Models;

use ListaShop\Option\Models\OptionValue;
use ListaShop\Option\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductOption extends Pivot
{
    /**
     * @var string Table name
     */
    protected $table = 'product_options';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The Option that belong to the Product Option.
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    /**
     * Get all of the option's values.
     */
    public function values()
    {
        return $this->belongsToMany(OptionValue::class, 
            'product_option_value',
            'product_option_id',
            'option_value_id'
        )->withPivot('price','price_type');
    }
    /**
     * Get all of the option's values.
     */
    // public function values()
    // {
    //     return $this->belongsToMany(OptionValue::class, 'product_option_value');
    // }
}
