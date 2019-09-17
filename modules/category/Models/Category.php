<?php

namespace Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'position', 'image', 'status', 'parent_id'
        'position', 'image', 'status', 'parent_id','name', 'popular',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}