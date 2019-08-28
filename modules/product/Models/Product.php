<?php

namespace Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sku', 'name', 'slug', 'new','featured','status'];

    protected $table = 'products';

}
