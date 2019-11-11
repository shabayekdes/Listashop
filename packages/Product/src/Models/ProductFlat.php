<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFlat extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'name',
        'price',
        'cost',
        'quantity',
        'thumbnail',
        'description',
        'short_description',
        'featured',
        'new',
        'special_price',
        'product_id'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'featured' => 'boolean',
        'new' => 'boolean',
        'special_price' => 'boolean'
    ];
}