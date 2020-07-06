<?php

namespace ListaShop\Product\Models;

use ListaShop\Order\Models\Order;
use Illuminate\Database\Eloquent\Model;
use ListaShop\Category\Models\Category;
use ListaShop\Attribute\Models\Attribute;
use ListaShop\Product\Models\ProductImage;
use ListaShop\Product\Models\ProductOption;
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
        'new' => 'boolean',
        'price' => 'double',
        'cost' => 'double',
        'special_price' => 'double'
    ];
    /**
     * Get the product items record associated with the order.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'total');
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
    /**
     * The roles that belong to the user.
     */
    public function options()
    {
        return $this->hasMany(ProductOption::class);

        // return $this->belongsToMany('Option\Models\Option','product_options')->withPivot('id');
    }
    /**
     * The roles that belong to the user.
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes')->withPivot('id');
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
        return $query->where('special_price', '!=', null);
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
        return (int) 100 - ceil($this->special_price * 100 / $this->price) . "%";;
    }
}
