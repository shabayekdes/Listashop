<?php

namespace Attribute\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    protected $table = 'attribute_values';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'attribute_id'];

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
