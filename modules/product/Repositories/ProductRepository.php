<?php

namespace Product\Repositories;

use Product\Models\Product;
use Core\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     *
     * @param  User  $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}