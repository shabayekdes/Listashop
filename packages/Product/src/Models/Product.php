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
     * Get children of product items record associated.
     */
    public function children()
    {
        return $this->hasMany( 'Product\Models\Product', 'parent_id', 'id' );
    }
    /**
     * Get parent of product items record associated.
     */
    public function parent()
    {
        return $this->hasOne( 'Product\Models\Product', 'id', 'parent_id' );
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
        return $this->belongsToMany('Attribute\Models\AttributeOption');
    }
    /**
     * The roles that belong to the user.
     */
    public function attributes()
    {
        return $this->belongsToMany('Attribute\Models\Attribute');
    }


}