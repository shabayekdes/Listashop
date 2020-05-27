<?php

namespace ListaShop\Shop\Http\Controllers;

use ListaShop\Product\Models\Product;
use App\Http\Controllers\Controller;

/**
 * Home page controller
 */
class HomeController extends Controller
{
    public function index()
    {
        $products = Product::whereIn('type', ['simple', 'configurable'])->take(20)->get();

        // dd($products);

        $featuredProducts = Product::where('featured', '=', true)->whereIn('type', ['simple', 'configurable'])->get();

        $saleProducts = Product::where('special_price', '!=', null)->whereIn('type', ['simple', 'configurable'])->get();

        return view('shop::home', compact('featuredProducts', 'saleProducts', 'products'));
    }
}
