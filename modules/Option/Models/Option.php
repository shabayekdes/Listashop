<?php

namespace ListaShop\Option\Models;

use ListaShop\Value\Models\Value;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'name', 'type', 'is_required'];

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
        return $this->morphMany(Value::class, 'valuable');
    }
}
