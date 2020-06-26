<?php

namespace ListaShop\Setting\Models;

use Illuminate\Database\Eloquent\Model;
use ListaShop\Core\Casts\Json;

class Setting extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'attributes' => Json::class,
    ];
}
