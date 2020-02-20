<?php

namespace Valuable\Models;

use Illuminate\Database\Eloquent\Model;

class Valuable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'price', 'price_type', 'position'];
}
