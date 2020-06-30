<?php

namespace ListaShop\Option\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Available option types.
     *
     * @var array
     */
    const types = [
        'dropdown', 'checkbox', 'radio', 'multiple_select',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_required' => 'boolean',
    ];

    /**
     * Get all of the option's values.
     */
    public function values()
    {
        return $this->hasMany(OptionValue::class);
    }
}
