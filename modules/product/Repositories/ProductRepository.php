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

    /**
     * Create a new product record in the database with thumb.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        // dd($data['image']);
        if($data['thumbnail']){
            $name = $data['slug'] .'.' . explode('/', explode(':', substr($data['thumbnail'], 0, strpos($data['thumbnail'], ';')))[1])[1];
            \Image::make($data['thumbnail'])->save(public_path('img/products/').$name);

            $data['thumbnail'] = $name;
        }
        return $this->model->create($data);
    }
}