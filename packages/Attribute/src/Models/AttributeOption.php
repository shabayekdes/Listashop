<?php

namespace Attribute\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    protected $table = 'attribute_options';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['label'];

    /**
     * The roles that belong to the user.
     */
    public function attribute()
    {
        return $this->belongsTo('Attribute\Models\Attribute');
    }
    /**
     * The roles that belong to the user.
     */
    public function products()
    {
        return $this->belongsToMany('Attribute\Models\AttributeOption');
    }
}