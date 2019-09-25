<?php

namespace App\Http\Controllers;

use Product\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $test = Product::get(['id']);

        dd($test);
    }
}
