<?php

namespace Product\Repositories;

use Core\Eloquent\BaseRepository;
use Illuminate\Container\Container as App;

class ProductAttributeOptionRepository extends BaseRepository
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
        return 'Product\Models\ProductAttributeOption';
    }
    /**
     * Create a new product flat record in the database with thumb.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createProductAttribute(array $data, $product)
    {
        $productFlat =  $product->flat()->create($data);
        return $this->uploadImages($productFlat, $product);
    }

}