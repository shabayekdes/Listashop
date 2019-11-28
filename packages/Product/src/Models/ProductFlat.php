<?php

namespace Product\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFlat extends Model
{
    protected $table = 'product_flats';

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
        'new' => 'boolean'
    ];
    /**
     * The images that belong to the product.
     */
    public function product()
    {
        return $this->belongsTo('Product\Models\Product');
    }
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnsale($query)
    {
        return $query->where('special_price', '!=' , null);
    }
    /**
     * Get the present price.
     *
     * @param  string  $value
     * @return string
     */
    public function getPresentPriceAttribute($value)
    {
        return '$' . number_format($this->price, 2);
    }
    /**
     * Get the discount price.
     *
     * @param  string  $value
     * @return string
     */
    public function getDiscountAttribute($value)
    {
        return (int) 100 - ceil($this->special_price * 100 / $this->price). "%";;
    }
}