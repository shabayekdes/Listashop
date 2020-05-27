<?php

namespace ListaShop\Product\Models;

use ListaShop\Value\Models\Value;
use ListaShop\Option\Models\Option;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'option_id',
    ];
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
        return $this->belongsToMany(Value::class, 'product_option_value');
    }
}
