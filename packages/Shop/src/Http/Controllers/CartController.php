<?php

namespace Shop\Http\Controllers;

use Cart\Cart;
use Product\Models\Product;
use App\Http\Controllers\Controller;

/**
 * Cart page controller
 */
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('shop::cart.index', compact('cart'));
    }
    /**
     * Add items to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $product = Product::find($id);

        if (session()->has('cart')) {
            $cart = new Cart(session('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Product was added');
    }

}