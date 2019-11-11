<?php

namespace Attribute\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['label'];
}