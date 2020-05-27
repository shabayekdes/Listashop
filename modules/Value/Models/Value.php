<?php

namespace ListaShop\Value\Models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'price', 'price_type', 'position'];

    /**
     * Get the owning valuable model.
     */
    public function valuable()
    {
        return $this->morphTo();
    }
}
