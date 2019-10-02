<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * Get the owning galleriable model.
     */
    public function galleriable()
    {
        return $this->morphTo();
    }
}
