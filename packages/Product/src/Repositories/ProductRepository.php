<?php

namespace Product\Repositories;

use Illuminate\Support\Str;
use Core\Eloquent\BaseRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Container\Container as App;
use Attribute\Repositories\AttributeOptionRepository;
use Product\Repositories\ProductAttributeOptionRepository;


class ProductRepository extends BaseRepository
{
    /**
     * ProductFlatRepository Repository Object
     *
     * @var object
     */
    protected $productFlat;
    /**
     * ProductAttributeOptionRepository Repository Object
     *
     * @var object
     */
    protected $pAttributeOption;
    /**
     * ProductAttributeOptionRepository Repository Object
     *
     * @var object
     */
    protected $attributeOption;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ProductFlatRepository $productFlat,
        ProductAttributeOptionRepository $pAttributeOption,
        AttributeOptionRepository $attributeOption,
        App $app
        )
    {
        parent::__construct($app);
        $this->productFlat = $productFlat;
        $this->pAttributeOption = $pAttributeOption;
        $this->attributeOption = $attributeOption;
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

        switch ($data['type']) {
            case 'simple':
                $this->productFlat->createProductFlat($data, $product);
                break;
            case 'attribute':

                break;

            // default:
            //     # code...
            //     break;
        }

        return $product;
    }


}
