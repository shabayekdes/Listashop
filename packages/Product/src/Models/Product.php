<?php

namespace Product\Models;

use Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    /**
     * @var string Table name
     */
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
        'is_active',
        'category_id',
        'name',
        'price',
        'cost',
        'qty',
        'thumbnail',
        'description',
        'short_description',
        'featured',
        'new',
        'new_from',
        'new_to',
        'special_price',
        'special_price_from',
        'special_price_to'
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
     * Get the product items record associated with the order.
     */
    public function orders()
    {
        return $this->belongsToMany('Order\Models\Order')->withPivot('quantity', 'total');
    }
    /**
     * The images that belong to the product.
     */
    public function images()
    {
        return $this->hasMany('Product\Models\ProductImage');
    }
    /**
     * The category that belong to the product.
     */
    public function category()
    {
        return $this->belongsTo('Category\Models\Category');
    }
    /**
     * The roles that belong to the user.
     */
    public function options()
    {
        return $this->belongsToMany('Option\Models\Option')->withPivot('id');
    }
    /**
     * The roles that belong to the user.
     */
    public function attributes()
    {
        return $this->belongsToMany('Attribute\Models\Attribute','product_attributes')->withPivot('id');
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
