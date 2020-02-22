<?php

namespace Attribute\Models;

use Value\Models\Value;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'name'];
    /**
     * Get all of the option's values.
     */
    public function values()
    {
        return $this->morphMany(Value::class, 'valuable');
    }

}
