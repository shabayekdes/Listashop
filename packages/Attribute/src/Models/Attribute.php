<?php

namespace Attribute\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The images that belong to the product.
     */
    public function options()
    {
        return $this->hasMany('Attribute\Models\AttributeOption');
    }

    /**
     * The category that belong to the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}