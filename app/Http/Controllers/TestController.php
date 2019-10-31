<?php

namespace App\Http\Controllers;

use Cart\Facades\Cart;
use Product\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        Cart::add(1, 'Shabayekdes', 1, 2541)
            ->associate('Product\Models\Product');

        dd(Cart::content());

        dd(File::exists('img/products/4.jpeg'));

        $test = Product::get(['id']);

        dd($test);
    }
}