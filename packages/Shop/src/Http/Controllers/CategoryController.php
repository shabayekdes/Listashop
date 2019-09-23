<?php

namespace Shop\Http\Controllers;

use Product\Models\Product;
use Category\Models\Category;
use App\Http\Controllers\Controller;
use Product\Repositories\ProductRepository;

/**
 * Home page controller
 */
class CategoryController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $product)
    {
        $this->_config = request('_config');
    }

    public function index()
    {
        $product = Product::latest();

        $products = $product->get();

        $saleProducts = Product::onsale()->get();

        $featuredProducts = Product::featured()->get();

        return view($this->_config['view'], compact('featuredProducts', 'saleProducts', 'products'));
    }

}
