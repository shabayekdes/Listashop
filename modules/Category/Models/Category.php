<?php

namespace ListaShop\Category\Models;

use Illuminate\Database\Eloquent\Model;
use ListaShop\Product\Models\Product;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'position', 'image', 'status', 'parent_id'
        'position', 'image', 'status', 'parent_id', 'name', 'popular',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
