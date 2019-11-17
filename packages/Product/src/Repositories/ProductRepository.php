<?php

namespace Product\Repositories;

use Illuminate\Support\Arr;
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
        $variations = json_decode($data['variations'], true);

        switch ($data['type']) {
            case 'simple':
                $this->productFlat->createProductFlat($data, $product);
                break;
            case 'configurable':
                foreach ($variations as $variant) {
                    $attributes_ids = Arr::pluck($variant['attributes'], 'id');
                    $data = [
                        "sku" => $product->sku . '-variant-' . implode('-', $attributes_ids),
                        "name" => "",
                        "price" => $variant['price'] ?? $data['price'],
                        "cost" => $variant['cost'] ?? $data['cost'],
                        "quantity" => $variant['quantity'] ?? $data['quantity'],
                    ];

                    $this->createVariant($variant, $product, $data);
                }
                break;
        }

        return $product;
    }
    /**
     * @param mixed $product
     * @param array $permutation
     * @param array $data
     * @return mixed
     */
    public function createVariant($variant ,$product, $data = [])
    {
        $productVariant = $product->children()->create([
            'type' => 'product-variant',
            'sku' => $data['sku'],
            'slug' => $product->slug,
            'categories_id' => $product->categories_id,
        ]);

        $attributes_ids = Arr::pluck($variant['attributes'], 'id');
        $productVariant->options()->attach($attributes_ids);
        $this->productFlat->createProductFlat($data, $productVariant);
    }
}