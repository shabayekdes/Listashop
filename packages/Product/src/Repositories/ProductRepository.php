<?php

namespace Product\Repositories;

use Illuminate\Container\Container as App;
use Product\Models\Product;
use Core\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
    }
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Product::class;
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

    /**
     * @param User  $user
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return User
     */
    public function update(array $data, $product) : Product
    {
        // dd($data['image']);
        if($data['thumbnail']){
            $name = $data['slug'] .'.' . explode('/', explode(':', substr($data['thumbnail'], 0, strpos($data['thumbnail'], ';')))[1])[1];
            \Image::make($data['thumbnail'])->save(public_path('img/products/').$name);

            $data['thumbnail'] = $name;
        }
        $product->update($data);
        return $product;
    }
}