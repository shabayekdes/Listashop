<?php

namespace ListaShop\Shop\Http\Controllers;

use ListaShop\Cart\Facades\Cart;
use ListaShop\Product\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // dd(Cart::content());
        return view('shop::cart.index');
    }
    /**
     * Add items to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $product = Product::find($id);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }

        Cart::add($id, $product->name, 1, $product->price, $request->options)
            ->associate('ListaShop\Product\Models\Product');

        return redirect()->back()->with('success', 'Product was added');
    }
}
