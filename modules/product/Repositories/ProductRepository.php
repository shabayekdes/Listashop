<?php

namespace Product\Repositories;

use Product\Models\Product;


/**
 * Product Repository
 *
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Get's all products.
     *
     * @return mixed
     */
    public function all()
    {

    }

    /**
     * Create a product.
     *
     * @param array
     */
    public function create(array $data)
    {

    }

    /**
     * Get's a product by it's ID
     *
     * @param int
     */
    public function get($product_id)
    {

    }

    /**
     * Updates a product.
     *
     * @param int
     * @param array
     */
    public function update($product_id, array $data)
    {

    }

    /**
     * Deletes a product.
     *
     * @param int
     */
    public function delete($product_id)
    {

    }

    /**
     * Returns featured product
     *
     * @return Collection
     */
    public function getFeaturedProducts()
    {
        return Product::featured()->get();
    }

}
