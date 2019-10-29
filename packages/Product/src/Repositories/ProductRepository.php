<?php

namespace Product\Repositories;

use Product\Models\Product;
use Core\Eloquent\BaseRepository;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Container\Container as App;

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
        return $this->model->create($this->storeImage($data));
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
        if (isset($data['thumbnail']) && File::exists('img/products/'. $product->thumbnail)) {
            File::delete('img/products/'. $product->thumbnail);
        }
        $product->update($this->storeImage($data));
        return $product;
    }

    private function storeImage($data)
    {
        if (isset($data['thumbnail'])) {

            $name = $data['slug'] .'.' . explode('/', explode(':', substr($data['thumbnail'], 0, strpos($data['thumbnail'], ';')))[1])[1];
            Image::make($data['thumbnail'])->fit(150, 150, null, 'top-left')->save(public_path('img/products/').$name);

            $data['thumbnail'] = $name;

        }
        return $data;
    }
}