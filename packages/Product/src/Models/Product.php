<?php

namespace Product\Models;

use Category\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'slug',
        'type',
        'status',
        'parent_id',
        'categories_id'
    ];
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
     * Get the product items record associated with the order.
     */
    public function orders()
    {
        return $this->belongsToMany('Order\Models\Order')->withPivot('quantity', 'total');
    }
    /**
     * The images that belong to the product.
     */
    public function flat()
    {
        return $this->hasOne('Product\Models\ProductFlat');
    }
    /**
     * The images that belong to the product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    /**
     * The category that belong to the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}