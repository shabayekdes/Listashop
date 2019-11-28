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
        $products = Product::with('flat')->whereIn('type', ['simple', 'configurable'])->take(20)->get();

        // dd($products);

        $featuredProducts = Product::whereHas('flat' , function ($query) {

            $query->where('featured','=', true);
        })->whereIn('type', ['simple', 'configurable'])->get();

        $saleProducts = Product::whereHas('flat' , function ($query) {

            $query->where('special_price','!=', null);
        })->whereIn('type', ['simple', 'configurable'])->get();

        return view('shop::home', compact('featuredProducts', 'saleProducts', 'products'));
    }

}