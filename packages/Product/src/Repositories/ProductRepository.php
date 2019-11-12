<?php

namespace Product\Repositories;

use Illuminate\Support\Str;
use Core\Eloquent\BaseRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Container\Container as App;


class ProductRepository extends BaseRepository
{
    /**
     * ProductFlatRepository Repository Object
     *
     * @var object
     */
    protected $productFlat;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductFlatRepository $productFlat, App $app)
    {
        parent::__construct($app);
        $this->productFlat = $productFlat;
    }
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'Product\Models\Product';
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
        $product = $this->model->create($data);
        $this->productFlat->createProductFlat($data, $product);

        return $product;
    }

}
