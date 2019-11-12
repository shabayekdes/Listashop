<?php

namespace Shop\Http\Controllers;

use Product\Models\Product;
use Category\Models\Category;
use App\Http\Controllers\Controller;
use Product\Repositories\ProductRepository;

/**
 * Home page controller
 */
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $product)
    {

    }

    public function index()
    {
        $product = Product::latest();

        $products = $product->get();

        $saleProducts = $product->get();

        $featuredProducts = $product->get();
        return view('shop::home', compact('featuredProducts', 'saleProducts', 'products'));
    }

}