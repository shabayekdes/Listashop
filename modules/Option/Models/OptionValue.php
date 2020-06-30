<?php

namespace ListaShop\Option\Models;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the option.
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
