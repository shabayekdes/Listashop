<?php

namespace Shop\Http\Controllers;

use Cart\Facades\Cart;
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
        // if (session()->has('cart')) {
        //     $cart = new Cart(session()->get('cart'));
        // } else {
        //     $cart = null;
        // }

        $cart = null;

        return view('shop::cart.index');
    }
    /**
     * Add items to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $product = Product::find($id);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }

        Cart::add($id, $product->name, 1, $product->price)
            ->associate('Product\Models\Product');

        return redirect()->back()->with('success', 'Product was added');
    }

}