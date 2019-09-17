<?php

namespace Product\Repositories;

use Product\Models\Product;
use Core\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Product::class;
    }
}
